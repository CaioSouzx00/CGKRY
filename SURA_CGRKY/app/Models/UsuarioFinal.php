<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioFinal extends Model
{
    use HasFactory; // 👈 ISSO QUE FALTOU

    protected $table = 'usuario_final';

    protected $fillable = [
        'sexo',
        'nome_completo',
        'data_nascimento',
        'email',
        'senha',
        'telefone',
        'cpf',
        'foto',
    ];

    public function enderecos()
    {   
        return $this->hasMany(EnderecoUsuarioFinal::class, 'id_usuario');
    }
}
