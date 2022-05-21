<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\UsuarioRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;class UsuariosController extends Controller
{
    public function index(UsuarioRepositoryInterface $model)
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


    public function listar( UsuarioRepositoryInterface $model)
    {
        $usuarios = $model->all();
        return $usuarios;
    }
}
