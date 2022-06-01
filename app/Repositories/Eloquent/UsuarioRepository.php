<?php


namespace App\Repositories\Eloquent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsuarioRepository
{
    private $model;

    public function __construct()
    {
      $this->model = app(User::class);
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

    public function count()
    {
        return $this->model->count();

    }

    public function update($dados)
    {
        return $this->model->where('id', Auth::user()->id)->update($dados);

    }



}
