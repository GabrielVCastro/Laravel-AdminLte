<?php

namespace App\Http\Controllers;
use App\Repositories\Eloquent\UsuarioRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
class UsuariosController extends Controller
{
    private $model;
    public function __construct(UsuarioRepository $model)
    {

        $this->model = $model;

    }

    public function index()
    {
        $this->checkAdm();
        $usuarios = $this->model->all();

        return view('clientes/lista', [
            'usuarios' => $usuarios,
            'titulo'   => 'Lista de Clientes'
        ]);
    }


    public function listar()
    {
        $this->checkAdm();
        $usuarios = $this->model->all();
        return $usuarios;
    }
}
