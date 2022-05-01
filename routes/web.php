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
    return view('index');
});

    
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
});



require __DIR__.'/auth.php';
