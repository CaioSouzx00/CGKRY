<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 🔄 AJUSTE: uso opcional do helper session() para manter padrão Laravel
        $admin = session('admin');

        if (!$admin) {
            return redirect()->route('login.form');
        }

        // 🔄 AJUSTE: comentário atualizado para refletir melhor o código
        // Buscar fornecedores com status "pendente"
        $fornecedoresPendentes = Fornecedor::where('status', 'pendente')->get();

        return view('admin.dashboard', compact('admin', 'fornecedoresPendentes'));
    }
}
