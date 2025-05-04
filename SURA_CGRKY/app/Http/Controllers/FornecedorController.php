<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\FornecedorPendente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\NotificarAdminNovoFornecedor;
use Illuminate\Support\Facades\Mail;
use App\Mail\FornecedorAprovadoMail;
use App\Mail\FornecedorRejeitadoMail;

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
    
            // Envia e-mail ao administrador
            Mail::to('hydrax064@gmail.com')->send(new NotificarAdminNovoFornecedor($fornecedor));
    
            return redirect()->route('fornecedores.create')->with('success', 'Fornecedor cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar o fornecedor. Tente novamente.');
        }
    }
    

    // Mostrar o formulário de login do fornecedor
    public function showLoginForm()
    {
        return view('admin.fornecedores.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);
    
        // Verifica se o fornecedor existe e se a senha está correta
        $fornecedor = Fornecedor::where('email', $request->email)->first();
    
        if ($fornecedor && Hash::check($request->senha, $fornecedor->senha)) {
            // Aqui estamos apenas armazenando os dados do fornecedor na sessão
            Session::put('fornecedor', $fornecedor);
            return redirect()->route('fornecedor.dashboard');
        }
    
        return back()->withErrors(['email' => 'E-mail ou senha incorretos.']);
    }
    
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
        Auth::logout();
        Session()->forget('fornecedor');

        return redirect()->route('fornecedor.login');
    }

    // Listar todos os fornecedores pendentes
    public function listarTodos()
    {
        $pendentes = FornecedorPendente::all();
        return view('admin.fornecedores.lista', compact('pendentes'));
    }

    // Aprovar fornecedor
public function aprovar($id)
{
    $fornecedorPendente = FornecedorPendente::findOrFail($id);

    // Cria o fornecedor na tabela 'fornecedores'
    $fornecedor = Fornecedor::create([
        'nome_empresa' => $fornecedorPendente->nome_empresa,
        'email' => $fornecedorPendente->email,
        'telefone' => $fornecedorPendente->telefone,
        'cnpj' => $fornecedorPendente->cnpj,
        'senha' => $fornecedorPendente->senha,
        'status' => 'aprovado',
    ]);

    // Remove da tabela 'fornecedores_pendentes'
    $fornecedorPendente->delete();

    // Envia e-mail de aprovação
    Mail::to($fornecedor->email)->send(new FornecedorAprovadoMail($fornecedor));

    return redirect()->route('admin.fornecedores')->with('success', 'Fornecedor aprovado com sucesso!');
}

// Rejeitar fornecedor
public function rejeitar($id)
{
    $fornecedor = FornecedorPendente::find($id);

    if (!$fornecedor) {
        return redirect()->route('admin.fornecedores')->with('error', 'Fornecedor não encontrado.');
    }

    // Envia e-mail de rejeição
    //Mail::to($fornecedor->email)->send(new FornecedorRejeitadoMail($fornecedor->email));
    Mail::to($fornecedor->email)->send(new FornecedorRejeitadoMail($fornecedor));


    // Remove da tabela 'fornecedores_pendentes'
    $fornecedor->delete();

    return redirect()->route('admin.fornecedores')->with('success', 'Fornecedor rejeitado e removido com sucesso.');
}

    // Exibir o formulário de cadastro de fornecedor pendente
    public function mostrarCadastroForm()
    {
        return view('admin.fornecedores.create');
    }

    // Processar o cadastro de um fornecedor pendente
    public function cadastrarFornecedor(Request $request)
    {
        // Validação dos dados recebidos no formulário
        $request->validate([
            'nome_empresa' => 'required|string|max:255',
            'email' => 'required|email|unique:fornecedores_pendentes,email',
            'telefone' => 'required|string|max:15',
            'cnpj' => 'required|string|max:18',
            'senha' => 'required|string|min:6', // Validação da senha
        ]);

        // Criação do fornecedor na tabela fornecedores_pendentes
        $fornecedor = FornecedorPendente::create([
            'nome_empresa' => $request->nome_empresa,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cnpj' => $request->cnpj,
            'senha' => bcrypt($request->senha), // Criptografando a senha antes de armazenar
        ]);

        // Enviar e-mail para o administrador
        Mail::to('hydrax064@gmail.com')->send(new NotificarAdminNovoFornecedor($fornecedor));

        // Redireciona para a página de login com mensagem de sucesso
        return redirect()->route('fornecedor.login')->with('success', 'Cadastro realizado com sucesso. Aguardando aprovação.');
    }

    public function index()
    {
        $pendentes = FornecedorPendente::all();
        return view('admin.fornecedores.lista', compact('pendentes'));
    }
}
