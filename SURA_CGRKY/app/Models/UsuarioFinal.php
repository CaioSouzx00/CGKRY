<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioFinal extends Model
{
    protected $table = 'usuario_final'; // 👈 força o nome correto da tabela

    protected $fillable = [
        'sexo',
        'nome_completo',
        'data_nascimento',
        'email',
        'senha',
        'telefone',
        'cpf',
    ];

}
