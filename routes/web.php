<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApiProdutosController;
use App\Http\Controllers\ApiClientesController;
use App\Http\Controllers\ApiComprasController;

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
    return view('welcome');
})->middleware(['auth']);

    
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('clientes')->group(function () {
        
        Route::get('/listar', [ClientesController::class, 'listar']);
        Route::get('/formulario/{id}', [ClientesController::class, 'abrirFormulario']);
        Route::post('/cadastrar', [ClientesController::class, 'cadastrar']);
        Route::post('/editar', [ClientesController::class, 'editar']);
        Route::get('/deletar/{id}', [ClientesController::class, 'deletar']);
    });
    
    Route::prefix('produtos')->group(function () {
        Route::get('/listar', [ProdutosController::class, 'listar']);
        Route::get('/formulario/{id}', [ProdutosController::class, 'abrirFormulario']);
        Route::post('/cadastrar', [ProdutosController::class, 'cadastrar']);
        Route::post('/editar', [ProdutosController::class, 'editar']);
        Route::get('/deletar/{id}', [ProdutosController::class, 'deletar']);
    });

    Route::prefix('compras')->group(function () {
        Route::get('/formulario/{id}', [ComprasController::class, 'abrirFormulario']);
        Route::get('/listar', [ComprasController::class, 'listarTodasCompras']);
        Route::get('/listarCompra/{cliente_id}', [ComprasController::class, 'listarCompra']);
        Route::post('/salvar', [ComprasController::class, 'salvar']);
    });


});

// Route::get('/dashboard',[DashboardController::class, 'index'], function () {
//     // return view('dashboard');


    



// })->middleware(['auth'])->name('dashboard');

Route::prefix('api/produtos')->group(function () {
    Route::get('/listar', [ApiProdutosController::class, 'listar']);
    Route::post('/cadastrar', [ApiProdutosController::class, 'cadastrar']);
    Route::post('/editar', [ApiProdutosController::class, 'editar']);
    Route::get('/deletar/{id}', [ApiProdutosController::class, 'deletar']);
});

Route::prefix('api/clientes')->group(function () {
    Route::get('/listar', [ApiClientesController::class, 'listar']);
    Route::post('/cadastrar', [ApiClientesController::class, 'cadastrar']);
    Route::post('/editar', [ApiClientesController::class, 'editar']);
    Route::get('/deletar/{id}', [ApiClientesController::class, 'deletar']);
});

Route::prefix('api/compras')->group(function () {
    Route::get('/listarTudo', [ApiComprasController::class, 'listarTodasCompras']);
    Route::get('/listarCompra/{cliente_id}', [ApiComprasController::class, 'listarCompra']);
    Route::post('/salvar', [ApiComprasController::class, 'salvar']);
});


require __DIR__.'/auth.php';
