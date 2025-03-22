
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('endereco_fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('cidade');
            $table->string('cep');
            $table->string('bairro');
            $table->string('estado');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('endereco_fornecedores');
    }
};
