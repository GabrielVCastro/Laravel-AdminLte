<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;

class Rifas extends Model
{
    use HasFactory;
    protected $fillable = [
        'documento',
        'status',
        'data_confirmacao',
        'produto_id',
        'usuario_id'
    ];

    public function produtos()
    {
        return  $this->belongsTo(Produtos::class, 'produto_id');
    }
}
