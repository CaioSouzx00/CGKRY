<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use App\Models\FornecedorPendente; // Certifique-se de importar o model de fornecedores pendentes

class AdminController extends Controller
{
    // Mostra o formulário de login do admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Lida com a tentativa de login
    public function login(Request $request)
    {
        $request->validate([
            'nome_usuario' => 'required',
            'senha' => 'required',
        ]);

        // Busca o admin pelo nome de usuário
        $admin = Administrador::where('nome_usuario', $request->nome_usuario)->first();

        // Verifica se encontrou e se a senha bate
        if (!$admin || !Hash::check($request->senha, $admin->senha)) {
            return back()->withErrors(['nome_usuario' => 'Nome de usuário ou senha inválidos'])->withInput();
        }

        // Salva o admin na sessão
        Session::put('admin', $admin);

        // Redireciona para o dashboard do admin
        return redirect()->route('admin.dashboard');
    }

    // Logout (opcional)
    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('admin.login.form');
    }

    // Mostra o dashboard do admin
    public function dashboard()
    {
        // Recupera os fornecedores pendentes do banco de dados
        $fornecedoresPendentes = FornecedorPendente::where('status', 'pendente')->get();

        // Passa os fornecedores pendentes para a view
        return view('admin.dashboard', compact('fornecedoresPendentes'));
    }
}
