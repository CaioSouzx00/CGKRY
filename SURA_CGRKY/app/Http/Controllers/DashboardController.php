<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔄 AJUSTE: uso do helper session() (opcional, mesmo comportamento)
        $usuario = session('usuario');

        // Verifique se o usuário está logado
        if (!$usuario) {
            return redirect()->route('login.form');
        }

        // Verifique se o usuário é admin
        if ($usuario->is_admin) {
            return view('admin.dashboard'); // Redireciona para o dashboard do admin
        }

        // Caso o usuário não seja admin, redireciona para o dashboard do usuário normal
        return view('usuario_final.dashboard'); // Ou qualquer outra view do usuário normal
    }
}
