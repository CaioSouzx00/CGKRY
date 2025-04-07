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
            'sexo' => 'required',
            'nome_completo' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:usuario_final,email',
            'senha' => 'required|min:6',
            'telefone' => 'required',
            'cpf' => 'required|regex:/^\d{11}$/|unique:usuario_final',
        ]);

        // Prepara os dados e criptografa a senha
        $dados = $request->all();
        $dados['senha'] = Hash::make($dados['senha']);

        // Salva no banco
        UsuarioFinal::create($dados);

        return redirect()->route('usuario_final.create')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
