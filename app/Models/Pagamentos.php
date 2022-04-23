<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamentos extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'pagamentos';

    protected $fillable = [
        'valor',
        'troco',
        'forma_pagamento',
        'compra_id'
    ];
    
    protected $casts = [
        'valor'     => 'double',
        'troco'     => 'double',
        'forma_pagamento' => 'string',
        'compra_id' => 'integer'
    ];

}
