<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fornecedores_pendentes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_empresa');
            $table->string('cnpj')->unique();
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('senha');
            $table->enum('status', ['pendente', 'aprovado', 'rejeitado'])->default('pendente');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedor_pendentes');
    }
};
