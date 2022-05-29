<?php


namespace App\Repositories\Eloquent;
use App\Models\User;

abstract class AbstractRepository
{

    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();

    }
    public function all()
    {
        return $this->model->all();
    }

    public function count()
    {
        return $this->model->count();
    }


    public function getId($id)
    {

        return $this->model->find($id);

    }

    protected function resolveModel()
    {

        return app($this->model);
    }

}
