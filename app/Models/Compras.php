<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    
    public $timestamps = true;

    protected $table = 'compras';

    protected $fillable = [
        'valor_total',
        'cliente_id',
        'data' 
    ];
    
    protected $casts = [
        'valor_total' => 'double',
        'cliente_id'  => 'integer',
        'data'        => 'date'
    ];
}
