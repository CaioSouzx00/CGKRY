<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FornecedorController extends Controller
{
    // Mostrar o formulário de criação do fornecedor
    public function create()
    {
        return view('admin.fornecedores.create');
    }

    // Processar o cadastro do fornecedor
    public function store(Request $request)
{
    $request->validate([
        'nome_empresa' => 'required|string|max:50',
        'cnpj' => 'required|string|unique:fornecedores,cnpj|min:14',
        'telefone' => 'required|string|max:15',
        'email' => 'required|email|max:60',
        'senha' => 'required|string|min:6',
    ]);

        Fornecedor::create([
            'nome_empresa' => $request->nome_empresa,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
        ]);

        return redirect()->route('fornecedores.create')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    // Mostrar o formulário de login do fornecedor
    public function showLoginForm()
    {
        return view('admin.fornecedores.login');
    }

    // Processar o login do fornecedor
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        $fornecedor = Fornecedor::where('email', $request->email)->first();

        if ($fornecedor && Hash::check($request->senha, $fornecedor->senha)) {
            Auth::login($fornecedor); // Autentica (opcional, mas mantém compatibilidade com Auth)

            // Salva o fornecedor na sessão
            Session()->put('fornecedor', $fornecedor);

            return redirect()->route('fornecedor.dashboard');
        }

        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ]);
    }

    // Dashboard do fornecedor (usa a view do usuário final)
    public function dashboard()
    {
        if (!Session::has('fornecedor')) {
            return redirect()->route('fornecedor.login');
        }

        $fornecedor = Session::get('fornecedor');

        // Reaproveita a view do usuário final
        $usuario = $fornecedor;
        $isFornecedor = true;

        return view('usuario_final.dashboard', compact('usuario', 'isFornecedor'));
    }

    // Logout do fornecedor
    public function logout()
    {
        Auth::logout(); // Faz o logout
        Session()->forget('fornecedor'); // Limpa a sessão do fornecedor

        return redirect()->route('fornecedor.login');
    }
}
