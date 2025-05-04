<?php

namespace App\Http\Controllers;

use App\Models\FornecedorPendente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificarAdminNovoFornecedor;
use App\Models\Fornecedor;

class FornecedorPendenteController extends Controller
{
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'nome_empresa' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20|unique:fornecedores_pendentes,cnpj',
            'email' => 'required|email|unique:fornecedores_pendentes,email',
            'telefone' => 'required|string|max:20',
            'senha' => 'required|string|min:6',
        ]);

        // Salva na tabela de pendentes
        $fornecedor = FornecedorPendente::create([
            'nome_empresa' => $request->nome_empresa,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'senha' => Hash::make($request->senha),
            'status' => 'pendente',
        ]);

        // Aqui será disparado o e-mail (a gente configura isso no próximo passo)
        // Exemplo temporário:
        Mail::to('hydrax064@gmail.com')->send(new NotificarAdminNovoFornecedor($fornecedor));
        Mail::raw("Novo fornecedor pendente: {$fornecedor->nome_empresa}", function ($message) {
            $message->to('hydrax064@gmail.com')->subject('Novo Fornecedor Pendente');
        });

        return response()->json([
            'message' => 'Cadastro enviado com sucesso. Aguarde a aprovação do administrador.'
        ], 201);
    }

public function index()
{
    $pendentes = FornecedorPendente::where('status', 'pendente')->get();
    return view('admin.fornecedores.pendentes', compact('pendentes'));
}

public function aprovar($id)
{
    $pendente = FornecedorPendente::findOrFail($id);

    // Mover dados para a tabela oficial
    Fornecedor::create([
        'nome_empresa' => $pendente->nome_empresa,
        'cnpj' => $pendente->cnpj,
        'email' => $pendente->email,
        'telefone' => $pendente->telefone,
        'senha' => $pendente->senha, // já está criptografada
    ]);

    // Remover da tabela de pendentes
    $pendente->delete();

    return redirect()->back()->with('success', 'Fornecedor aprovado com sucesso.');
}

public function rejeitar($id)
{
    $pendente = FornecedorPendente::findOrFail($id);
    $pendente->status = 'rejeitado';
    $pendente->save();

    return redirect()->back()->with('success', 'Fornecedor rejeitado.');
}

}
