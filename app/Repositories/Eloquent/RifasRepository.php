<?php

namespace App\Repositories\Eloquent;
use App\Models\Rifas;
class RifasRepository
{

    private $model;

    public function __construct()
    {
      $this->model = app(Rifas::class);
    }
    public function all()
    {
        return $this->model->all();
    }
    public function save($dados)
    {

        return $this->model->create($dados);
    }

    public function get_id($id)
    {

        return $this->model->find($id);
    }

    public function delete($id)
    {

        return $this->model->destroy($id);
    }



}
