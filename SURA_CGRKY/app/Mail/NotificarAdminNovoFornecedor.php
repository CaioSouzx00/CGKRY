<?php

namespace App\Mail;

use App\Models\FornecedorPendente;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificarAdminNovoFornecedor extends Mailable
{
    use Queueable, SerializesModels;

    public $fornecedor;

    public function __construct(FornecedorPendente $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function build()
    {
        return $this->subject('Novo Fornecedor Pendente')
            ->view('emails.novo_fornecedor_pendente');
    }
}
