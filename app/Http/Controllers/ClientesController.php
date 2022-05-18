<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;class ClientesController extends Controller
{
    public function index(ClienteRepositoryInterface $model)
    {
        $usuarios = $model->all();
        if(!Auth::user()->adm){
            return abort(404);
        }
        return view('clientes', [
            'clienteJs'=> true,
            'usuarios' => $usuarios
        ]);
    }


    public function listar( ClienteRepositoryInterface $model)
    {
        $usuarios = $model->all();
        return $usuarios;
    }
}
