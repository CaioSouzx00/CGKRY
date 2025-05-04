<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FornecedorPendente extends Model
{
    use HasFactory;

    protected $table = 'fornecedores_pendentes';

    protected $fillable = [
        'nome_empresa',
        'cnpj',
        'email',
        'telefone',
        'senha',
        'status',
    ];

    protected $hidden = [
        'senha',
    ];
}
