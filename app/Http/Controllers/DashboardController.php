<?php

namespace App\Http\Controllers;
use App\Repositories\Eloquent\UsuarioRepository;
use App\Repositories\Eloquent\RifasRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $model, $modelRifas;
    public function __construct(UsuarioRepository $model, RifasRepository $modelRifas)
    {

        $this->model      = $model;
        $this->modelRifas = $modelRifas;

    }

    public function index()
    {
        $qtdUsuarios  = $this->model->count();
        $rifasUsuario = $this->modelRifas->count(Auth::user()->id);

        return view('dashboard', [
            'qtdUsuarios'  => $qtdUsuarios,
            'titulo'       => 'Dashboard',
            'rifasUsuario' => $rifasUsuario
        ]);
    }



}
