<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Produtos extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'produtos';
    

    protected $fillable = [
        'nome',
        'descricao',
        'unidade',
        'quantidade',
        'preco'
    ];

    protected $casts = [
        'nome'       => 'string',
        'descricao'  => 'string',
        'unidade'    => 'string',
        'quantidade' => 'float',
        'preco'      => 'double'
    ];


}
