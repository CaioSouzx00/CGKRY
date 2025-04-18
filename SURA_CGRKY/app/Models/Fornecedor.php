<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Adiciona isso

class Fornecedor extends Authenticatable // Herda de Authenticatable
{
    protected $table = 'fornecedores'; // <-- Adiciona isso aqui

    protected $fillable = [
        'nome_empresa', 'cnpj', 'senha', 'telefone', 'email',
    ];

    protected $hidden = [
        'senha', // Adiciona isso para ocultar a senha em respostas JSON
    ];

    public function endereco()
    {
        return $this->hasOne(EnderecoFornecedor::class, 'fornecedor_id');
    }
}
