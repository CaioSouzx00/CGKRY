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
        // Validação dos dados do formulário
        $validated = $request->validate([
            'cidade' => 'required|string|max:60',
            'cep' => 'required|string|max:10',
            'bairro' => 'required|string|max:60',
            'estado' => 'required|string|max:2',
            'rua' => 'required|string|max:60',
            'numero' => 'required|string|max:10',
        ]);

        // Criação do novo endereço associado ao usuário
        $endereco = new EnderecoUsuarioFinal($validated);
        $endereco->id_usuario = $id; // Associa o endereço ao usuário com ID
        $endereco->save(); // Salva o endereço no banco

        // Redireciona para a página anterior com uma mensagem de sucesso
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
            'cep' => 'required|string|max:10',
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
