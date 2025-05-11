<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Administrador;
use App\Models\FornecedorPendente;

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

        // 🔄 AJUSTE: Limita apenas aos campos esperados
        $credentials = $request->only('nome_usuario', 'senha');

        $admin = Administrador::where('nome_usuario', $credentials['nome_usuario'])->first();

        if (!$admin || !Hash::check($credentials['senha'], $admin->senha)) {
            return back()->withErrors(['nome_usuario' => 'Nome de usuário ou senha inválidos'])->withInput();
        }

        // 🔄 AJUSTE: Uso alternativo do helper session() (opcional, mesmo comportamento)
        session(['admin' => $admin]);

        return redirect()->route('admin.dashboard');
    }

    // Logout
    public function logout()
    {
        // 🔄 AJUSTE: Mesmo aqui, uso do helper session() (opcional)
        session()->forget('admin');
        return redirect()->route('admin.login.form');
    }

    // Dashboard
    public function dashboard()
    {
        $fornecedoresPendentes = FornecedorPendente::where('status', 'pendente')->get();
        $quantidadePendentes = $fornecedoresPendentes->count();

        return view('admin.dashboard', compact('fornecedoresPendentes', 'quantidadePendentes'));
    }

    public function dadosGraficos()
    {
        // Contagem de usuários por mês (na tabela usuario_final)
        $usuariosPorMes = DB::table('usuario_final')
            ->select(DB::raw('MONTH(created_at) as mes'), DB::raw('count(*) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)')) // 🔄 AJUSTE: Garante ordenação dos meses
            ->pluck('total', 'mes');

        // Contagem de fornecedores por mês (na tabela fornecedores)
        $fornecedoresPorMes = DB::table('fornecedores')
            ->select(DB::raw('MONTH(created_at) as mes'), DB::raw('count(*) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)')) // 🔄 AJUSTE: Mesmo aqui
            ->pluck('total', 'mes');

        // Preenche as labels (meses) com base nos dados
        $labels = range(1, 12);

        // Preenche os dados dos usuários por mês
        $usuarios = array_map(function ($month) use ($usuariosPorMes) {
            return $usuariosPorMes->get($month, 0); // Retorna 0 caso o mês não tenha dados
        }, $labels);

        // Preenche os dados dos fornecedores por mês
        $fornecedores = array_map(function ($month) use ($fornecedoresPorMes) {
            return $fornecedoresPorMes->get($month, 0); // Retorna 0 caso o mês não tenha dados
        }, $labels);

        // Retorna os dados como resposta JSON
        return response()->json([
            'labels' => $labels,
            'usuarios' => $usuarios,
            'fornecedores' => $fornecedores
        ]);
    }
}
