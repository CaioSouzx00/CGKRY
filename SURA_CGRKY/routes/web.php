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
use App\Http\Controllers\Auth\FornecedorPasswordResetController;

// ==============================
// ROTAS DE USUÁRIO FINAL
// ==============================

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

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
// ROTAS DE RECUPERAÇÃO DE SENHA
// ==============================

// Exibir o formulário de recuperação de senha (usuário final)
Route::get('/esqueci-senha/enviar-codigo', [PasswordResetController::class, 'mostrarFormulario'])->name('password.enviarCodigo.form');
Route::post('/esqueci-senha/enviar-codigo', [PasswordResetController::class, 'enviarCodigo'])->name('password.enviarCodigo');
Route::get('/esqueci-senha/verificar-codigo', [PasswordResetController::class, 'mostrarFormularioVerificacao'])->name('password.verificarCodigoForm');
Route::post('/esqueci-senha/verificar-codigo', [PasswordResetController::class, 'verificarCodigo'])->name('password.verificarCodigo');
Route::get('/esqueci-senha/redefinir', [PasswordResetController::class, 'mostrarFormularioRedefinir'])->name('password.redefinirSenhaForm');
Route::post('/esqueci-senha/redefinir', [PasswordResetController::class, 'redefinirSenha'])->name('password.redefinirSenha');

// Exibir o formulário de recuperação de senha (fornecedor)
Route::prefix('admin/fornecedores')->group(function () {
    Route::get('/esqueci-senha/enviar-codigo', [FornecedorPasswordResetController::class, 'mostrarFormulario'])->name('fornecedor.password.enviarCodigo.form');
    Route::post('/esqueci-senha/enviar-codigo', [FornecedorPasswordResetController::class, 'enviarCodigo'])->name('fornecedor.password.enviarCodigo');
    Route::get('/esqueci-senha/verificar-codigo', [FornecedorPasswordResetController::class, 'mostrarFormularioVerificacao'])->name('fornecedor.password.verificarCodigoForm');
    Route::post('/esqueci-senha/verificar-codigo', [FornecedorPasswordResetController::class, 'verificarCodigo'])->name('fornecedor.password.verificarCodigo');
    Route::get('/esqueci-senha/redefinir', [FornecedorPasswordResetController::class, 'mostrarFormularioRedefinir'])->name('fornecedor.password.redefinirSenhaForm');
    Route::post('/esqueci-senha/redefinir', [FornecedorPasswordResetController::class, 'redefinirSenha'])->name('fornecedor.password.redefinirSenha');
});

Route::get('/admin/fornecedores/esqueci-senha', [FornecedorPasswordResetController::class, 'mostrarFormulario'])->name('fornecedor.password.esqueciSenhaForm');

// Rota para listar todos os fornecedores
Route::get('/admin/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.lista');

use App\Http\Controllers\AdminDashboardController;

// Rota para o dashboard do admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Rota para listar todos os fornecedores no painel administrativo
Route::get('/admin/fornecedores', [FornecedorController::class, 'index'])->name('admin.fornecedores');

// Aprovar fornecedor
Route::post('/admin/fornecedores/{id}/aprovar', [FornecedorController::class, 'aprovar'])->name('fornecedor.aprovar');

// Rejeitar fornecedor
Route::post('/admin/fornecedores/{id}/rejeitar', [FornecedorController::class, 'rejeitar'])->name('fornecedor.rejeitar');

// Cadastro de fornecedor
Route::get('/fornecedor/cadastro', [FornecedorController::class, 'mostrarCadastroForm'])->name('fornecedor.create');
Route::post('/fornecedor/cadastro', [FornecedorController::class, 'cadastrarFornecedor'])->name('fornecedor.create.post');


//Route::get('/usuario/{id}/enderecos', [EnderecoUsuarioFinalController::class, 'listarEnderecos'])->name('usuario.enderecos');


Route::get('/usuario/{id}/enderecos', [EnderecoUsuarioFinalController::class, 'index'])->name('usuario.enderecos');
Route::delete('/usuario/{id}/enderecos/{endereco_id}', [EnderecoUsuarioFinalController::class, 'destroy'])->name('endereco.destroy');
Route::get('/usuario/{id}/enderecos', [EnderecoUsuarioFinalController::class, 'index'])->name('endereco.index');
Route::get('/usuario/{id}/enderecos', [EnderecoUsuarioFinalController::class, 'index'])->name('usuario.enderecos');
