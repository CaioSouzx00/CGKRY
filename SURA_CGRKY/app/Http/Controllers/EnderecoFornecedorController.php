<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnderecoFornecedor;
use App\Models\Fornecedor;

class EnderecoFornecedorController extends Controller
{
    public function index($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $enderecos = EnderecoFornecedor::where('fornecedor_id', $id)->get();

        return view('admin.fornecedores.endereco.index', compact('fornecedor', 'enderecos'));
    }

    public function create($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('admin.fornecedores.endereco.create', compact('fornecedor'));
    }

public function store(Request $request, $id)
{
    // Verifica quantos endereços o fornecedor já possui
    $quantidadeEnderecos = EnderecoFornecedor::where('fornecedor_id', $id)->count();
    
    if ($quantidadeEnderecos >= 3) {
        return redirect()->back()->withErrors([
            'limite' => 'Este fornecedor já cadastrou o número máximo de 3 endereços.'
        ]);
    }

    // Validação dos dados do formulário
    $validated = $request->validate([
        'cidade' => 'required|string|max:60',
        'cep' => 'required|string|max:8',
        'bairro' => 'required|string|max:60',
        'estado' => 'required|string|max:2',
        'rua' => 'required|string|max:60',
    ]);

    // Verifica se o endereço já existe para o mesmo fornecedor
    $enderecoExistente = EnderecoFornecedor::where('fornecedor_id', $id)
        ->where('cidade', $validated['cidade'])
        ->where('cep', $validated['cep'])
        ->where('bairro', $validated['bairro'])
        ->where('estado', $validated['estado'])
        ->where('rua', $validated['rua'])
        ->exists();

    if ($enderecoExistente) {
        return redirect()->back()->withErrors([
            'duplicado' => 'Este endereço já está cadastrado para este fornecedor.'
        ]);
    }

    // Criação do novo endereço associado ao fornecedor
    $validated['fornecedor_id'] = $id;
    EnderecoFornecedor::create($validated);

    return redirect()
        ->route('fornecedor.endereco.index', $id)
        ->with('success', 'Endereço cadastrado com sucesso!');
}

    public function edit($id, $endereco_id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $endereco = EnderecoFornecedor::where('fornecedor_id', $id)
            ->where('id', $endereco_id)
            ->firstOrFail();

        return view('admin.fornecedores.endereco.edita', compact('fornecedor', 'endereco'));
    }

    public function update(Request $request, $id, $endereco_id)
    {
        $validated = $request->validate([
            'cidade' => 'required|string|max:60',
            'estado' => 'required|string|max:2',
            'bairro' => 'required|string|max:60', 
            'rua' => 'required|string|max:60',
            'cep' => 'required|string|max:8',
        ]);

        $endereco = EnderecoFornecedor::where('fornecedor_id', $id)
            ->where('id', $endereco_id)
            ->firstOrFail();

        $endereco->update($validated);

        return redirect()
            ->route('fornecedor.endereco.index', $id)
            ->with('success', 'Endereço atualizado com sucesso!');
    }

    public function destroy($id, $endereco_id)
    {
        $endereco = EnderecoFornecedor::where('fornecedor_id', $id)
            ->where('id', $endereco_id)
            ->firstOrFail();

        $endereco->delete();

        return redirect()
            ->route('fornecedor.endereco.index', $id)
            ->with('success', 'Endereço excluído com sucesso!');
    }
}
