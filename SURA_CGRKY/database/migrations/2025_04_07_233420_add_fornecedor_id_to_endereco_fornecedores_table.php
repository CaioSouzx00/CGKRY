<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('endereco_fornecedores', function (Blueprint $table) {
            $table->unsignedBigInteger('fornecedor_id')->after('estado'); // ou after('estado') pra manter a ordem
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('cascade');
        });
    }
    

    public function down(): void
    {
        Schema::table('endereco_fornecedores', function (Blueprint $table) {
            $table->dropForeign(['fornecedor_id']);
            $table->dropColumn('fornecedor_id');
        });
    }
    
};
