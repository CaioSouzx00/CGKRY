<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioFinalController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EnderecoFornecedorController;
use App\Http\Controllers\EnderecoUsuarioFinalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\PasswordResetController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});


// ==============================
// ROTAS DE USUÁRIO FINAL
// ==============================

// Cadastro de usuário final
Route::get('/usuario-final/cadastro', [UsuarioFinalController::class, 'create'])->name('usuario_final.create');
Route::post('/usuario-final', [UsuarioFinalController::class, 'store'])->name('usuario_final.store');

// Login do usuário final
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard do usuário final
Route::get('/dashboard', function () {
    if (!Session::has('usuario')) return redirect()->route('login.form');

    $usuario = Session::get('usuario');
    $isFornecedor = property_exists($usuario, 'cnpj') && !empty($usuario->cnpj);

    return view('usuario_final.dashboard', compact('usuario', 'isFornecedor'));
})->name('dashboard');

// Endereço do usuário final
Route::get('/usuario_final/{id}/endereco', [EnderecoUsuarioFinalController::class, 'create'])->name('endereco.create');
Route::post('/usuario_final/{id}/endereco', [EnderecoUsuarioFinalController::class, 'store'])->name('endereco.store');

// Editar endereço do usuário final
Route::get('/usuario_final/{id}/endereco/{endereco_id}/edit', [EnderecoUsuarioFinalController::class, 'edit'])->name('endereco.edit');
Route::put('/usuario_final/{id}/endereco/{endereco_id}', [EnderecoUsuarioFinalController::class, 'update'])->name('endereco.update');

// Listar endereços do usuário final
Route::get('/usuario/{id}/enderecos', [EnderecoUsuarioFinalController::class, 'listarEnderecos'])->name('usuario.enderecos');


// ==============================
// ROTAS DE ADMINISTRADOR
// ==============================

// Login do admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// Dashboard do admin
Route::get('/admin/dashboard', function () {
    if (!Session::has('admin')) return redirect()->route('admin.login.form');
    
    $admin = Session::get('admin');
    return view('admin.dashboard', compact('admin'));
})->name('admin.dashboard');

// Logout do admin
Route::get('/admin/logout', function () {
    Session::forget('admin');
    return redirect()->route('admin.login.form');
})->name('admin.logout');


// ==============================
// ROTAS DE FORNECEDORES
// ==============================

// Cadastro de fornecedores (Admin)
Route::get('/admin/fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/admin/fornecedores/store', [FornecedorController::class, 'store'])->name('fornecedores.store');

// Login do fornecedor
Route::get('/fornecedor/login', [FornecedorController::class, 'showLoginForm'])->name('fornecedor.login');
Route::post('/fornecedor/login', [FornecedorController::class, 'login'])->name('fornecedor.login.post');

// Dashboard do fornecedor
Route::get('/fornecedor/dashboard', [FornecedorController::class, 'dashboard'])->name('fornecedor.dashboard');

// Endereço do fornecedor
Route::get('/fornecedores/{id}/endereco', [EnderecoFornecedorController::class, 'create'])->name('fornecedor.endereco.create');
Route::post('/fornecedores/{id}/endereco', [EnderecoFornecedorController::class, 'store'])->name('fornecedor.endereco.store');

// Rota para listar os endereços do fornecedor
Route::get('/fornecedor/{id}/enderecos', [EnderecoFornecedorController::class, 'index'])->name('fornecedor.endereco.index');

// Rota para editar um endereço do fornecedor
Route::get('/fornecedor/{id}/enderecos/{endereco_id}/edit', [EnderecoFornecedorController::class, 'edit'])->name('fornecedor.endereco.edit');

// Rota para atualizar um endereço do fornecedor
Route::put('/fornecedor/{id}/enderecos/{endereco_id}', [EnderecoFornecedorController::class, 'update'])->name('fornecedor.endereco.update');

// Rota para excluir um endereço do fornecedor
Route::delete('/fornecedor/{id}/enderecos/{endereco_id}', [EnderecoFornecedorController::class, 'destroy'])->name('fornecedor.endereco.destroy');

// ==============================
// ROTAS DE DASHBOARD
// ==============================

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ==============================
// OUTRAS ROTAS DE ENDEREÇOS
// ==============================

// Exibir lista de endereços do usuário final
Route::get('/usuario_final/{id}/enderecos', [EnderecoUsuarioFinalController::class, 'index'])->name('endereco.index');

// Exibir formulário de edição de endereço do usuário final
Route::get('/usuario_final/{id}/endereco/{endereco_id}/edit', [EnderecoUsuarioFinalController::class, 'edit'])->name('endereco.edit');

// Atualizar o endereço do usuário final
Route::put('/usuario_final/{id}/endereco/{endereco_id}', [EnderecoUsuarioFinalController::class, 'update'])->name('endereco.update');

// Deletar o endereço do usuário final
Route::delete('/usuario_final/{id}/endereco/{endereco_id}', [EnderecoUsuarioFinalController::class, 'destroy'])->name('endereco.destroy');






// Exibir o formulário para enviar o código (GET)
Route::get('/esqueci-senha/enviar-codigo', [PasswordResetController::class, 'mostrarFormulario'])->name('password.enviarCodigo.form');

// Enviar o código (POST)
Route::post('/esqueci-senha/enviar-codigo', [PasswordResetController::class, 'enviarCodigo'])->name('password.enviarCodigo');

// Exibir o formulário de verificação do código (GET)
Route::get('/esqueci-senha/verificar-codigo', [PasswordResetController::class, 'mostrarFormularioVerificacao'])->name('password.verificarCodigoForm');

// Verificar o código (POST)
Route::post('/esqueci-senha/verificar-codigo', [PasswordResetController::class, 'verificarCodigo'])->name('password.verificarCodigo');

// Exibir o formulário de redefinir senha (GET)
Route::get('/esqueci-senha/redefinir', [PasswordResetController::class, 'mostrarFormularioRedefinir'])->name('password.redefinirSenhaForm');

// Redefinir a senha (POST)
Route::post('/esqueci-senha/redefinir', [PasswordResetController::class, 'redefinirSenha'])->name('password.redefinirSenha');
