<?php

namespace App\Http\Controllers;

use App\Models\EnderecoUsuarioFinal;
use App\Models\UsuarioFinal;
use Illuminate\Http\Request;

class EnderecoUsuarioFinalController extends Controller
{
    // Exibe o formulário de criação do endereço
    public function create($id)
    {
        // Busca o usuário com o ID fornecido
        $usuario = UsuarioFinal::findOrFail($id);

        // Retorna a view com o formulário para adicionar o endereço
        return view('usuario_final.endereco.create', compact('usuario'));
    }

    // Processa o formulário de cadastro de endereço
   public function store(Request $request, $id)
{
    // Verifica quantos endereços o usuário já possui
    $quantidadeEnderecos = EnderecoUsuarioFinal::where('id_usuario', $id)->count();

    if ($quantidadeEnderecos >= 3) {
        return redirect()->back()->withErrors(['limite' => 'Você já cadastrou o número máximo de 3 endereços.']);
    }

    // Validação dos dados do formulário
    $validated = $request->validate([
        'cidade' => 'required|string|max:60',
        'cep' => 'required|string|max:10',
        'bairro' => 'required|string|max:60',
        'estado' => 'required|string|max:2',
        'rua' => 'required|string|max:60',
        'numero' => 'required|string|max:10',
    ]);

    // Verifica se o endereço já existe para o mesmo usuário
    $enderecoExistente = EnderecoUsuarioFinal::where('id_usuario', $id)
        ->where('cidade', $validated['cidade'])
        ->where('cep', $validated['cep'])
        ->where('bairro', $validated['bairro'])
        ->where('estado', $validated['estado'])
        ->where('rua', $validated['rua'])
        ->where('numero', $validated['numero'])
        ->exists();

    if ($enderecoExistente) {
        return redirect()->back()->withErrors(['duplicado' => 'Este endereço já está cadastrado.']);
    }

    // Criação do novo endereço associado ao usuário
    $endereco = new EnderecoUsuarioFinal($validated);
    $endereco->id_usuario = $id;
    $endereco->save();

    return redirect()->back()->with('success', 'Endereço salvo com sucesso!');
}

    // Exibe o formulário de edição
    public function edit($id, $endereco_id)
    {
        $usuario = \App\Models\UsuarioFinal::findOrFail($id);
        $endereco = $usuario->enderecos()->where('id', $endereco_id)->firstOrFail();
    
        return view('usuario_final.endereco.edita', compact('usuario', 'endereco'));
    }

    // Processa a atualização do endereço
    public function update(Request $request, $id, $endereco_id)
    {
        $endereco = EnderecoUsuarioFinal::where('id_usuario', $id)
                    ->where('id', $endereco_id)
                    ->firstOrFail();
    
        $request->validate([
            'cidade' => 'required|string|max:100',
            'cep' => 'required|string|min:8',
            'bairro' => 'required|string|max:100',
            'estado' => 'required|string|max:50',
            'rua' => 'required|string|max:150',
            'numero' => 'required|string|max:10',
        ]);
    
        $endereco->update($request->all());
    
        return redirect()->route('endereco.index', ['id' => $id])->with('success', 'Endereço atualizado com sucesso!');
    }

    // Exibe todos os endereços de um usuário
    public function index($id)
    {
        // Busca todos os endereços do usuário com o ID fornecido
        $usuario = UsuarioFinal::findOrFail($id);
        $enderecos = EnderecoUsuarioFinal::where('id_usuario', $id)->get();

        // Retorna a view com a lista de endereços
        return view('usuario_final.endereco.index', compact('usuario', 'enderecos'));
    }

    public function destroy($id, $endereco_id)
    {
        $endereco = EnderecoUsuarioFinal::where('id_usuario', $id)->where('id', $endereco_id)->firstOrFail();

        $endereco->delete();

        return redirect()->route('endereco.index', ['id' => $id])->with('success', 'Endereço excluído com sucesso!');
    }
}