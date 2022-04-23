<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\Compras;


class DashboardController extends Controller
{
    public function index()
    {
        $qtdClientes = Clientes::all()->count();
        $qtdCompras  = Compras::all()->count();
        $qtdProdutos = Produtos::all()->count();
        
        return view('dashboard')
                    ->with('qtdClientes', $qtdClientes)
                    ->with('qtdProdutos', $qtdProdutos)
                    ->with('qtdCompras', $qtdCompras)
                    ->with('titulo', 'Dashboard');
    }
}
