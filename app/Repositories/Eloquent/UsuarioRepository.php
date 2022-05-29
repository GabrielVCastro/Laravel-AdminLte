<?php


namespace App\Repositories\Eloquent;
use App\Models\User;


class UsuarioRepository
{
    private $model;

    public function __construct()
    {
      $this->model = app(User::class);
    }
    public function all()
    {
        $model = app(User::class);

        return $model->all();
    }
    public function save($dados)
    {
        $model = app(User::class);

        return $model->create($dados);
    }

    public function get_id($id)
    {
        $model = app(User::class);

        return $model->find($id);
    }

    public function delete($id)
    {
        $model = app(User::class);

        return $model->destroy($id);
    }

    public function count(){
        $model = app(User::class);

        return $model->count();

    }



}
