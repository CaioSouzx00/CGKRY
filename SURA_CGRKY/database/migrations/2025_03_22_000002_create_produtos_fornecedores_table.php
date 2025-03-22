
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('produtos_fornecedores', function (Blueprint $table) {
            $table->id();
            $table->decimal('preco', 8, 2);
            $table->text('descricao');
            $table->string('fornecedor');
            $table->string('caracteristica_produto');
            $table->text('historia');
            $table->unsignedBigInteger('id_produto');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('produtos_fornecedores');
    }
};
