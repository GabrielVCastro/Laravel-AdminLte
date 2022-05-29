<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProdutosRepository;
class SiteController extends Controller
{
    public function index(ProdutosRepository $model){
        $produtos = $model->all()->toArray();
        return view('index')->with('produtos', $produtos);
    }
}
