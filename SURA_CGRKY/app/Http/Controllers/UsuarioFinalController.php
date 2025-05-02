<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioFinal;
use Illuminate\Support\Facades\Hash;

class UsuarioFinalController extends Controller
{
    public function create()
    {
        return view('usuario_final.create'); 
    }

    public function store(Request $request)
{
    // Regras de validação
    $request->validate([
        'sexo' => 'required',
        'nome_completo' => 'required|string|max:50',
        'data_nascimento' => 'required|date',
        'email' => 'required|email|unique:usuario_final,email',
        'senha' => 'required|string|min:6',
        'telefone' => 'required',
        'cpf' => 'required|regex:/^\d{11}$/|unique:usuario_final',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ], [
        'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
    ]);

    // Prepara os dados e criptografa a senha
    $dados = $request->all();
    $dados['senha'] = Hash::make($dados['senha']);

    // Se o usuário enviou uma imagem, armazene
    if ($request->hasFile('foto')) {
        $caminhoFoto = $request->file('foto')->store('fotos_usuario_final', 'public');
        $dados['foto'] = $caminhoFoto;
    }

    UsuarioFinal::create($dados);

    return redirect()->route('login.form')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
}

}
