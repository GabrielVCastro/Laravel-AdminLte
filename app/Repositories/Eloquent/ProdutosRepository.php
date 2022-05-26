<?php

namespace App\Repositories\Eloquent;
use App\Models\Produtos;
class ProdutosRepository
{
    public function all()
    {
        $model = app(Produtos::class);

        return $model->all();
    }
    public function save($dados)
    {
        $model = app(Produtos::class);

        return $model->create($dados);
    }

    public function get_id($id)
    {
        $model = app(Produtos::class);

        return $model->find($id);
    }

    public function delete($id)
    {
        $model = app(Produtos::class);

        return $model->destroy($id);
    }



}
