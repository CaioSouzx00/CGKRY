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
        $request->validate([
            'sexo' => 'required|string',
            'nome_completo' => 'required|string|max:50',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:usuario_final,email',
            'senha' => 'required|string|min:6',
            'telefone' => 'required|string',
            'cpf' => 'required|regex:/^\d{11}$/|unique:usuario_final,cpf',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'cpf.regex' => 'O CPF deve conter exatamente 11 dígitos numéricos.',
        ]);

        $dados = $request->except('foto');
        $dados['senha'] = Hash::make($request->senha);

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('fotos_usuario_final', 'public');
        }

        UsuarioFinal::create($dados);

        return redirect()->route('login.form')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
    }
}
