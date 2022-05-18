<?php


namespace App\Repositories\Eloquent;
use App\Models\User;
use App\Repositories\Contracts\ClienteRepositoryInterface;

class ClienteRepository extends AbstractRepository implements ClienteRepositoryInterface
{

    protected $model = User::class;


}
