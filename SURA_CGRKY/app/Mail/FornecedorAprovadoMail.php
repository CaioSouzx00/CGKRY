<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FornecedorAprovadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fornecedor;

    public function __construct($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function build()
    {
        return $this->subject('Cadastro Aprovado')
            ->view('emails.fornecedor_aprovado');
    }
}
