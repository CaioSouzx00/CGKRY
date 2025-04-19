<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioFinalController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EnderecoFornecedorController;
use App\Http\Controllers\EnderecoUsuarioFinalController;

Route::get('/', function () {
    return view('welcome');
});

// Usuário Final
Route::get('/usuario-final/cadastro', [UsuarioFinalController::class, 'create'])->name('usuario_final.create');
Route::post('/usuario-final', [UsuarioFinalController::class, 'store'])->name('usuario_final.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    if (!Session::has('usuario')) return redirect()->route('login.form');

    $usuario = Session::get('usuario');
    $isFornecedor = property_exists($usuario, 'cnpj') && !empty($usuario->cnpj);

    return view('usuario_final.dashboard', compact('usuario', 'isFornecedor'));
})->name('dashboard');

// Admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', function () {
    if (!Session::has('admin')) return redirect()->route('admin.login.form');
    $admin = Session::get('admin');
    return view('admin.dashboard', compact('admin'));
})->name('admin.dashboard');
Route::get('/admin/logout', function () {
    Session::forget('admin');
    return redirect()->route('admin.login.form');
})->name('admin.logout');

// Fornecedores
Route::get('/admin/fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/admin/fornecedores/store', [FornecedorController::class, 'store'])->name('fornecedores.store');
Route::get('/fornecedor/login', [FornecedorController::class, 'showLoginForm'])->name('fornecedor.login');
Route::post('/fornecedor/login', [FornecedorController::class, 'login'])->name('fornecedor.login.post');
Route::get('/fornecedor/dashboard', [FornecedorController::class, 'dashboard'])->name('fornecedor.dashboard');

// Endereço do Fornecedor
Route::get('/fornecedores/{id}/endereco', [EnderecoFornecedorController::class, 'create'])->name('fornecedor.endereco.create');
Route::post('/fornecedores/{id}/endereco', [EnderecoFornecedorController::class, 'store'])->name('fornecedor.endereco.store');



Route::get('/usuario_final/{id}/endereco', [EnderecoUsuarioFinalController::class, 'create'])->name('endereco.create');
Route::post('/usuario_final/{id}/endereco', [EnderecoUsuarioFinalController::class, 'store'])->name('endereco.store');

