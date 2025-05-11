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

        // 🔄 AJUSTE: Limita os dados que serão usados
        $credentials = $request->only('email', 'senha');

        $usuario = UsuarioFinal::where('email', $credentials['email'])->first();

        if (!$usuario || !Hash::check($credentials['senha'], $usuario->senha)) {
            return back()->withErrors(['email' => 'Email ou senha inválidos'])->withInput();
        }

        // 🔄 AJUSTE: Usa helper session() (opcional, mesmo comportamento)
        session(['usuario' => $usuario]);

        return redirect()->route('dashboard'); // redirecionamento pode ser ajustado conforme necessário
    }
}
