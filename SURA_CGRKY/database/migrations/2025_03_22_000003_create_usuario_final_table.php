
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('usuario_final', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('sexo');
            $table->date('data_nascimento');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('cpf')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('usuario_final');
    }
};
