<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnderecoFornecedor;
use App\Models\Fornecedor;

class EnderecoFornecedorController extends Controller
{
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

        // Buscar o fornecedor após salvar o endereço
        $fornecedor = Fornecedor::findOrFail($id);

        // Retornar a view correta com o fornecedor
        return view('admin.fornecedores.endereco.create', compact('fornecedor'));
    }
}
