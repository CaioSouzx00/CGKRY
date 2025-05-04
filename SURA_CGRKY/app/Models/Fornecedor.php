<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores'; // Nome da tabela
    protected $fillable = ['nome_empresa', 'cnpj', 'email', 'telefone', 'status', 'senha'];


    public function endereco()
    {
        return $this->hasOne(EnderecoFornecedor::class, 'fornecedor_id');
    }
}

