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
Route::get('/rifa', function () {
    return view('index');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('clientes')->group(function (){
        Route::get('/', [UsuariosController::class, 'index']);
        Route::get('/formulario/{id}', [UsuariosController::class, 'abrirFormulario']);
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
