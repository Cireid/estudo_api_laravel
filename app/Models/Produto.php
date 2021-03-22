<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome_produto',
        'descricao_produto',
        'valor_produto',
        'quantidade_produto',
    ];
}
