<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return view('produtos/index', [
            'produtoJs'=> true
        ]);
    }

    public function abrirFormulario()
    {
        return view("produtos/formulario");
    }
}
