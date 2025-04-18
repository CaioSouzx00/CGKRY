<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioFinalController;
use App\Http\Controllers\FornecedorController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rotas do Usuário Final
|--------------------------------------------------------------------------
*/
Route::get('/usuario-final/cadastro', [UsuarioFinalController::class, 'create'])->name('usuario_final.create');
Route::post('/usuario-final', [UsuarioFinalController::class, 'store'])->name('usuario_final.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    if (!Session::has('usuario')) {
        return redirect()->route('login.form');
    }

    $usuario = Session::get('usuario');
    $isFornecedor = isset($usuario->cnpj); // Detecta se é fornecedor

    return view('usuario_final.dashboard', compact('usuario', 'isFornecedor'));
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rotas do Admin
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/admin/dashboard', function () {
    if (!Session::has('admin')) {
        return redirect()->route('admin.login.form');
    }

    $admin = Session::get('admin');
    return view('admin.dashboard', compact('admin'));
})->name('admin.dashboard');

Route::get('/admin/logout', function () {
    Session::forget('admin');
    return redirect()->route('admin.login.form');
})->name('admin.logout');

// Cadastro de fornecedores via admin
Route::get('/admin/fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/admin/fornecedores/store', [FornecedorController::class, 'store'])->name('fornecedores.store');

/*
|--------------------------------------------------------------------------
| Rotas do Fornecedor
|--------------------------------------------------------------------------
*/

// Formulário de login do fornecedor
Route::get('fornecedor/login', [FornecedorController::class, 'showLoginForm'])->name('fornecedor.login');

// Processa login do fornecedor
Route::post('fornecedor/login', [FornecedorController::class, 'login'])->name('fornecedor.login.post');

// (Não mais usada diretamente, redirecionamento vai para /dashboard)
Route::get('usuario_final/dashboard', [FornecedorController::class, 'dashboard'])->name('fornecedor.dashboard');
