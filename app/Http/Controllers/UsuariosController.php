<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\UsuarioRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
class UsuariosController extends Controller
{
    public function index(UsuarioRepositoryInterface $model)
    {
        $usuarios = $model->all();
        $this->checkAdm();
        return view('clientes/lista', [
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
