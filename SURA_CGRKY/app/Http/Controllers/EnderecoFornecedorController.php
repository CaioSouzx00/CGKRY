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
            return redirect()->back()->withErrors(['limite' => 'Este fornecedor já cadastrou o número máximo de 3 endereços.']);
        }
        
        // Validação dos dados do formulário
        $validated = $request->validate([
            'cidade' => 'required|string|max:60',
            'cep' => 'required|string|max:8',
            'bairro' => 'required|string|max:60',
            'estado' => 'required|string|max:2',
            'rua' => 'required|string|max:60',
        ]);
        
        // Criação do novo endereço associado ao fornecedor
        $endereco = new EnderecoFornecedor($validated);
        $endereco->fornecedor_id = $id;
        $endereco->save();
        
        return redirect()->route('fornecedor.endereco.index', $id)->with('success', 'Endereço cadastrado com sucesso!');
    }
    

    public function edit($id, $endereco_id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $endereco = EnderecoFornecedor::where('fornecedor_id', $id)->where('id', $endereco_id)->firstOrFail();

        return view('admin.fornecedores.endereco.edita', compact('fornecedor', 'endereco'));
    }

    public function update(Request $request, $id, $endereco_id)
    {
        $request->validate([
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'bairro' => 'required|string',
            'rua' => 'required|string',
            'cep' => 'required|string',
        ]);

        $endereco = EnderecoFornecedor::where('fornecedor_id', $id)->where('id', $endereco_id)->firstOrFail();
        $endereco->update($request->all());

        return redirect()->route('fornecedor.endereco.index', $id)->with('success', 'Endereço atualizado com sucesso!');
    }

    public function destroy($id, $endereco_id)
    {
        $endereco = EnderecoFornecedor::where('fornecedor_id', $id)->where('id', $endereco_id)->firstOrFail();
        $endereco->delete();

        return redirect()->route('fornecedor.endereco.index', $id)->with('success', 'Endereço excluído com sucesso!');
    }
}
