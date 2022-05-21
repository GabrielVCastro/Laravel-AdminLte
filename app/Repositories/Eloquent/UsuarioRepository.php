<?php


namespace App\Repositories\Eloquent;
use App\Models\User;
use App\Repositories\Contracts\UsuarioRepositoryInterface;

class UsuarioRepository extends AbstractRepository implements UsuarioRepositoryInterface
{

    protected $model = User::class;


}
