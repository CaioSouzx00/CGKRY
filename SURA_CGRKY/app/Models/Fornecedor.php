<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores'; // <-- Adiciona isso aqui

    protected $fillable = [
        'nome_empresa', 'cnpj', 'senha', 'telefone', 'email',
    ];

    public function endereco()
    {
        return $this->hasOne(EnderecoFornecedor::class, 'fornecedor_id');
    }
}
