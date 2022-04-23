<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProdutos extends Model
{
    use HasFactory;

    protected $table = 'compra_produtos';
    public $timestamps = false;

    
    protected $fillable = [
        'produto_id',
        'compra_id'
    ];
    
    protected $casts = [
        'produto_id' => 'integer',
        'compra_id'  => 'integer'
    ];


    
}
