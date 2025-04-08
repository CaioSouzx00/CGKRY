<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoFornecedor extends Model
{
    use HasFactory;

    protected $table = 'endereco_fornecedores';

    protected $fillable = [
        'cidade', 'cep', 'bairro', 'estado', 'rua', 'fornecedor_id',
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }
}
