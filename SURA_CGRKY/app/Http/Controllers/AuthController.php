<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioFinal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('usuario_final.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = UsuarioFinal::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return back()->withErrors(['email' => 'Email ou senha inválidos'])->withInput();
        }

        // Salva na sessão (ou pode usar Auth se preferir)
        Session::put('usuario', $usuario);

        return redirect()->route('dashboard'); // muda pra onde quiser redirecionar após login
    }

}

