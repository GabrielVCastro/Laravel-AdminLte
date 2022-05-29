<?php

namespace App\Http\Controllers;
use App\Repositories\Eloquent\UsuarioRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends Controller
{
    private $model;
    public function __construct(UsuarioRepository $model)
    {

        $this->model = $model;

    }

    public function index()
    {

        $qtdUsuarios = $this->model->count();
        return view('dashboard', [
            'qtdUsuarios' => $qtdUsuarios,
            'titulo'      => 'Dashboard'
        ]);
    }



}
