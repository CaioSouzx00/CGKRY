<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;

use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{


    public function index()
    {
        $admin = Session::get('admin');
    
        if (!$admin) {
            return redirect()->route('login.form');
        }
    
        // Buscar fornecedores pendentes (ajuste a lógica conforme seu banco)
        $fornecedoresPendentes = Fornecedor::where('status', 'pendente')->get();
    
        return view('admin.dashboard', compact('admin', 'fornecedoresPendentes'));
    }
    
}

