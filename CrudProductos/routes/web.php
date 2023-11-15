<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LogoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})-> name('Dashboard');

Route::get('/productos', [ProductosController::class, 'index'])->name('ProductosIndex');

Route::get('/productos/create', [ProductosController::class, 'create'])->name('ProductosCreate');

Route::post('/productos', [ProductosController::class, 'store'])->name('ProductosStore');

Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('ProductosEdit');

Route::patch('/productos/{producto}', [ProductosController::class, 'update'])->name('ProductosUpdate');

Route::delete('/Productos/{producto}', [ProductosController::class,'destroy'])->name('ProductosDestroy');

//registro
Route::get('/registro', [RegistroController::class, 'index'])->name('RegistroIndex');

Route::post('/registro', [RegistroController::class, 'store'])->name('RegistroStore');

Route::get('/muro', [MuroController::class, 'index'])->name('MuroIndex');
//login
Route::get('/Login', [LoginController::class, 'index'])->name('LoginIndex');
Route::post('/Login', [LoginController::class, 'store'])->name('LoginStore');
//Logout
Route::post('/Logout', [LogoutController::class, 'store'])->name('LogoutStore');
