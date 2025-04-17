<?php
namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // Validação dos dados do fornecedor
        $request->validate([
            'nome_empresa' => 'required|string',
            'cnpj' => 'required|string|unique:fornecedores,cnpj',
            'telefone' => 'required|string',
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        // Criação do fornecedor
        Fornecedor::create([
            'nome_empresa' => $request->nome_empresa,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),  // Criptografa a senha
        ]);

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('fornecedores.create')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    // Mostrar o formulário de login do fornecedor
    public function showLoginForm()
    {
        return view('admin.fornecedores.login'); // Alterei para apontar para a pasta admin
    }


    // Processar o login do fornecedor
    public function login(Request $request)
    {
        // Validar as credenciais de login
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        // Procurar o fornecedor pelo e-mail
        $fornecedor = Fornecedor::where('email', $request->email)->first();

        // Verificar se o fornecedor existe e se a senha está correta
        if ($fornecedor && Hash::check($request->senha, $fornecedor->senha)) {
            // Logar o fornecedor
            Auth::login($fornecedor);

            // Redirecionar para o dashboard
            return redirect()->route('fornecedor.dashboard');
        }

        // Se falhar, retornar com erro
        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ]);
    }

    // Dashboard após o login
    public function dashboard()
    {
        return view('admin.fornecedor.dashboard'); // Alterei para apontar para a pasta admin
    }

    // Logout (opcional)
    public function logout()
    {
        Auth::logout();
        return redirect()->route('fornecedor.login');
    }
}
