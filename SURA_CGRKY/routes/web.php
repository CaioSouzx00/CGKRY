<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioFinalController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario-final/cadastro', [UsuarioFinalController::class, 'create'])->name('usuario_final.create');
Route::post('/usuario-final', [UsuarioFinalController::class, 'store'])->name('usuario_final.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    if (!Session::has('usuario')) {
        return redirect()->route('login.form');
    }

    $usuario = Session::get('usuario');
    return view('usuario_final.dashboard', ['usuario' => $usuario]);
})->name('dashboard');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');


Route::get('/admin/dashboard', function () {
    if (!Session::has('admin')) {
        return redirect()->route('admin.login.form');
    }

    $admin = Session::get('admin');
    return view('admin.dashboard', ['admin' => $admin]);
})->name('admin.dashboard');

Route::get('/admin/logout', function () {
    Session::forget('admin');
    return redirect()->route('admin.login.form');
})->name('admin.logout');

use App\Http\Controllers\FornecedorController;

Route::get('/admin/fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/admin/fornecedores/store', [FornecedorController::class, 'store'])->name('fornecedores.store');
