<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnderecoUsuarioFinal extends Model
{
    protected $table = 'endereco_usuario_final';

    protected $fillable = [
        'id_usuario',
        'cidade',
        'cep',
        'bairro',
        'estado',
        'numero',
        'rua'
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuarioFinal::class, 'id_usuario');
    }
    
}
