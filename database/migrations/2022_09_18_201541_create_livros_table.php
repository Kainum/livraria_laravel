<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo', 100);
            $table->string('resumo', 1000);
            $table->string('isbn', 20);
            $table->string('autor', 100);
            $table->string('imagem')->nullable();
            $table->date('data_lancamento');
            $table->double('preco',8,2);
            $table->integer('paginas')->unsigned();
            $table->integer('qtd_estoque')->unsigned();

            $table->foreignId('editora_id')->nullable()->constrained('editoras');

            $table->foreignId('colecao_id')->nullable()->constrained('colecoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
};
