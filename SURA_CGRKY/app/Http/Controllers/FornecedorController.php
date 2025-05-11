<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\FornecedorPendente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificarAdminNovoFornecedor;
use App\Mail\FornecedorAprovadoMail;
use App\Mail\FornecedorRejeitadoMail;

class FornecedorController extends Controller
{
    // Mostrar formulário de cadastro
    public function create()
    {
        return view('admin.fornecedores.create');
    }

    // Processar o cadastro direto (usado por administrador)
    public function store(Request $request)
    {
        $request->validate([
            'nome_empresa' => 'required|string|max:50',
            'cnpj' => 'required|string|unique:fornecedores,cnpj|max:14',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|unique:fornecedores,email|max:60',
            'senha' => 'required|string|min:6',
        ]);

        try {
            $fornecedor = Fornecedor::create([
                'nome_empresa' => $request->nome_empresa,
                'cnpj' => $request->cnpj,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'senha' => bcrypt($request->senha),
            ]);

            Mail::to('hydrax064@gmail.com')->send(new NotificarAdminNovoFornecedor($fornecedor));

            return redirect()->route('fornecedores.create')->with('success', 'Fornecedor cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar o fornecedor. Tente novamente.');
        }
    }

    // Mostrar formulário de login
    public function showLoginForm()
    {
        return view('admin.fornecedores.login');
    }

    // Processar login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        $fornecedor = Fornecedor::where('email', $request->email)->first();

        if ($fornecedor && Hash::check($request->senha, $fornecedor->senha)) {
            Session::put('fornecedor', $fornecedor);
            return redirect()->route('fornecedor.dashboard');
        }

        return back()->withErrors(['email' => 'E-mail ou senha incorretos.']);
    }

    // Dashboard do fornecedor
    public function dashboard()
    {
        if (!Session::has('fornecedor')) {
            return redirect()->route('fornecedor.login');
        }

        $usuario = Session::get('fornecedor');
        $isFornecedor = true;

        return view('usuario_final.dashboard', compact('usuario', 'isFornecedor'));
    }

    // Logout do fornecedor
    public function logout()
    {
        Session::forget('fornecedor');
        return redirect()->route('fornecedor.login');
    }

    // Exibir fornecedores pendentes (duplicado como 'index')
    public function index()
    {
        $pendentes = FornecedorPendente::all();
        return view('admin.fornecedores.lista', compact('pendentes'));
    }

    // Aprovar fornecedor
    public function aprovar($id)
    {
        $pendente = FornecedorPendente::findOrFail($id);

        $fornecedor = Fornecedor::create([
            'nome_empresa' => $pendente->nome_empresa,
            'email' => $pendente->email,
            'telefone' => $pendente->telefone,
            'cnpj' => $pendente->cnpj,
            'senha' => $pendente->senha, // já criptografada
            'status' => 'aprovado',
        ]);

        $pendente->delete();

        Mail::to($fornecedor->email)->send(new FornecedorAprovadoMail($fornecedor));

        return redirect()->route('admin.fornecedores')->with('success', 'Fornecedor aprovado com sucesso!');
    }

    // Rejeitar fornecedor
    public function rejeitar($id)
    {
        $pendente = FornecedorPendente::findOrFail($id);

        Mail::to($pendente->email)->send(new FornecedorRejeitadoMail($pendente));
        $pendente->delete();

        return redirect()->route('admin.fornecedores')->with('success', 'Fornecedor rejeitado com sucesso.');
    }

    // Exibir formulário de cadastro (por fornecedor)
    public function mostrarCadastroForm()
    {
        return view('admin.fornecedores.create');
    }

    // Processar cadastro de fornecedor pendente
    public function cadastrarFornecedor(Request $request)
    {
        $request->validate([
            'nome_empresa' => 'required|string|max:255',
            'email' => 'required|email|unique:fornecedores_pendentes,email',
            'telefone' => 'required|string|max:15',
            'cnpj' => 'required|string|max:18',
            'senha' => 'required|string|min:6',
        ]);

        $fornecedor = FornecedorPendente::create([
            'nome_empresa' => $request->nome_empresa,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cnpj' => $request->cnpj,
            'senha' => bcrypt($request->senha),
        ]);

        Mail::to('hydrax064@gmail.com')->send(new NotificarAdminNovoFornecedor($fornecedor));

        return redirect()->route('fornecedor.login')->with('success', 'Cadastro enviado! Aguarde a aprovação.');
    }
}
