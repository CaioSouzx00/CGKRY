<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    // Função para exibir o formulário de recuperação de senha
    public function mostrarFormulario()
    {
        return view('usuario_final.forgot-password'); // Caminho correto da sua view de "Esqueci a senha"
    }

    // Função para enviar o código para o e-mail
    public function enviarCodigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuario_final,email',
        ]);

        // Gerar o código de 6 dígitos
        $token = random_int(100000, 999999); // só números

        // Salvar ou atualizar o código na tabela password_resets
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        // Enviar o e-mail com o código
        Mail::raw("Seu código de recuperação de senha é: {$token}", function ($message) use ($request) {
            $message->to($request->email)
                    ->from('caionk03@gmail.com', 'CGKRY') // Use um remetente validado!
                    ->subject('Código de Recuperação de Senha');
        });

        // Agora redireciona para o formulário de verificação do código com o e-mail já passado como parâmetro
        return redirect()->route('password.verificarCodigoForm', ['email' => $request->email])
                         ->with('success', 'Código enviado para seu e-mail.');
    }

    // Função para exibir o formulário de verificação de código
    public function mostrarFormularioVerificacao(Request $request)
    {
        $email = $request->email;
        return view('usuario_final.verify-code', compact('email')); // Corrigido para a view de verificação do código
    }

    // Função para verificar o código enviado
    public function verificarCodigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuario_final,email',
            'token' => 'required|numeric',
        ]);

        // Buscar o token no banco
        $reset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return back()->withErrors(['token' => 'Código inválido ou expirado.']);
        }

        // Se encontrou o token, tudo certo, redirecionar para a página de redefinir senha
        return redirect()->route('password.redefinirSenhaForm', ['email' => $request->email, 'token' => $request->token]);
    }

    // Função para mostrar o formulário de redefinir senha
    public function mostrarFormularioRedefinir(Request $request)
    {
        // Pega o email e o token da query string
        $email = $request->query('email');
        $token = $request->query('token');

        // Verificar se o token existe no banco de dados
        $reset = DB::table('password_resets')
                    ->where('email', $email)
                    ->where('token', $token)
                    ->first();

        if (!$reset) {
            return redirect()->route('password.esqueciSenhaForm')
                             ->withErrors(['token' => 'O código de recuperação é inválido ou expirou.']);
        }

        return view('usuario_final.reset-password', compact('email', 'token'));
    }

    // Função para redefinir a senha
    public function redefinirSenha(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuario_final,email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required',
        ]);

        // Verificar se o token é válido
        $reset = DB::table('password_resets')
                    ->where('email', $request->email)
                    ->where('token', $request->token)
                    ->first();

        if (!$reset) {
            return redirect()->route('password.esqueciSenhaForm')
                             ->withErrors(['token' => 'O código de recuperação é inválido ou expirou.']);
        }

        // Atualizar a senha no banco de dados
        DB::table('usuario_final')
            ->where('email', $request->email)
            ->update(['senha' => Hash::make($request->password)]);

        // Remover o token da tabela password_resets
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Senha redefinida com sucesso.');
    }
}
