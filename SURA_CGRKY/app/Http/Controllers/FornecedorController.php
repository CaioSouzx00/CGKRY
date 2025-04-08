<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\EnderecoFornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function create()
{
    return view('admin.fornecedores.create'); // ajusta esse caminho se tua view estiver em outro lugar
}

    public function store(Request $request)
    {
        $request->validate([
            'nome_empresa' => 'required|string',
            'cnpj' => 'required|string|unique:fornecedores,cnpj',
            'senha' => 'required|string',
            'telefone' => 'required|string',
            'email' => 'required|email',
            'cidade' => 'required|string',
            'cep' => 'required|string',
            'bairro' => 'required|string',
            'estado' => 'required|string',
            'rua' => 'required|string',
        ]);

        $fornecedor = Fornecedor::create([
            'nome_empresa' => $request->nome_empresa,
            'cnpj' => $request->cnpj,
            'senha' => bcrypt($request->senha),
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        EnderecoFornecedor::create([
            'cidade' => $request->cidade,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
            'estado' => $request->estado,
            'rua' => $request->rua,
            'fornecedor_id' => $fornecedor->id,
        ]);

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor cadastrado com sucesso!');
    }
}
