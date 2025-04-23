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
        $request->validate([
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'bairro' => 'required|string',
            'rua' => 'required|string',
            'cep' => 'required|string',
        ]);

        EnderecoFornecedor::create([
            'fornecedor_id' => $id,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'cep' => $request->cep,
        ]);

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
