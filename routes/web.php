<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\RifasController;


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


Route::get('/', [SiteController::class, 'index']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('clientes')->group(function (){
        Route::get('/', [UsuariosController::class, 'index']);
        Route::get('/formulario/{id}', [UsuariosController::class, 'abrirFormulario']);
        Route::get('/painel', [UsuariosController::class, 'listarPainel']);
        Route::get('/update', [UsuariosController::class, 'update']);
    });

    Route::prefix('rifas')->group(function (){
        Route::get('/', [RifasController::class, 'listarRifas']);
        Route::get('/listar', [RifasController::class, 'listarRifaCompradas']);
        Route::get('/comprar/{id}', [RifasController::class, 'comprar']);
        Route::get('/excluir/{documento}', [RifasController::class, 'excluirRifa']);
    });

    Route::prefix('produtos')->group(function () {
        Route::get('/', [ProdutosController::class, 'index']);
        Route::get('/formulario', [ProdutosController::class, 'abrirFormulario']);
        Route::post('/cadastrar', [ProdutosController::class, 'cadastrar']);
        Route::get('/excluir/{id}', [ProdutosController::class, 'delete']);
        // Route::get('/formulario', [ProdutosController::class, 'abrirFormulario']);
    });



});



require __DIR__.'/auth.php';
