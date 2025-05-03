<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class FornecedorPasswordResetController extends Controller
{
    public function mostrarFormulario()
    {
        return view('admin.fornecedores.forgot-password');
    }

    public function enviarCodigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:fornecedores,email',
        ]);

        $token = random_int(100000, 999999);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        Mail::raw("Seu código de recuperação de senha é: {$token}", function ($message) use ($request) {
            $message->to($request->email)
                    ->from('caionk03@gmail.com', 'CGKRY')
                    ->subject('Código de Recuperação de Senha - Fornecedor');
        });

        return redirect()->route('fornecedor.password.verificarCodigoForm', ['email' => $request->email])
                         ->with('success', 'Código enviado para seu e-mail.');
    }

    public function mostrarFormularioVerificacao(Request $request)
    {
        $email = $request->email;
        return view('admin.fornecedores.verify-code', compact('email'));
    }

    public function verificarCodigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:fornecedores,email',
            'token' => 'required|numeric',
        ]);

        $reset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return back()->withErrors(['token' => 'Código inválido ou expirado.']);
        }

        return redirect()->route('fornecedor.password.redefinirSenhaForm', [
            'email' => $request->email,
            'token' => $request->token
        ]);
    }

    public function mostrarFormularioRedefinir(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        $reset = DB::table('password_resets')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$reset) {
            return redirect()->route('fornecedor.password.enviarCodigo.form')
                             ->withErrors(['token' => 'O código de recuperação é inválido ou expirou.']);
        }

        return view('admin.fornecedores.reset-password', compact('email', 'token'));
    }

    public function redefinirSenha(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:fornecedores,email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required',
        ]);

        $reset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return redirect()->route('fornecedor.password.enviarCodigo.form')
                             ->withErrors(['token' => 'O código de recuperação é inválido ou expirou.']);
        }

        DB::table('fornecedores')
            ->where('email', $request->email)
            ->update(['senha' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Senha redefinida com sucesso.');
    }
}
