<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/clientes', [UsuariosController::class, 'index']);
    Route::prefix('produtos')->group(function () {
        Route::get('/listar', [ProdutosController::class, 'index']);
        Route::get('/formulario', [ProdutosController::class, 'abrirFormulario']);
    });
});



require __DIR__.'/auth.php';
