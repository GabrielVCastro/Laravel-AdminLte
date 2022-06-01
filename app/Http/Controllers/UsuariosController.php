<?php

namespace App\Http\Controllers;
use App\Repositories\Eloquent\UsuarioRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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

    public function listarPainel(){

        $usuario = $this->model->get_id(Auth::user()->id);

        return view('painel_cliente/index', [
         'titulo'   => 'Painel de Controle',
         'usuario' => $usuario

        ]);
    }

    public function update(Request $request){

        $resultado = $this->model->update($request->all());
        return redirect('/clientes/painel')->with('success', 'Usuário Alterado com sucesso.');
    }
}
