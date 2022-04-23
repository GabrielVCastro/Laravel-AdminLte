<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'email',
        'data_nascimento'
    ];
    
    protected $casts = [
        'nome'          => 'string',
        'sobrenome'     => 'string',
        'cpf'           => 'string',
        'email'         => 'string',
        'data_nascimento'  => 'date'
    ];
}
