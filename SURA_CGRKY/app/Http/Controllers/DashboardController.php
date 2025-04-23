<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $usuario = Session::get('usuario');

        if (!$usuario) {
            return redirect()->route('login.form');
        }

        $isFornecedor = property_exists($usuario, 'cnpj') && !empty($usuario->cnpj);
        $endereco = method_exists($usuario, 'enderecos') ? $usuario->enderecos()->first() : null;

        return view('usuario_final.dashboard', compact('usuario', 'isFornecedor', 'endereco'));
    }
}
