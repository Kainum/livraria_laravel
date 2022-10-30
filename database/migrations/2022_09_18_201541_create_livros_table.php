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
            $table->string('isbn', 14);
            $table->string('autor', 100);
            $table->string('imagem');
            $table->date('data_lancamento');
            $table->double('preco',8,2);
            $table->integer('paginas');
            $table->integer('qtd_estoque');

            $table->bigInteger('editora_id')->unsigned()->nullable();
            $table->foreign('editora_id')->references('id')->on('editoras');

            $table->bigInteger('colecao_id')->unsigned()->nullable();
            $table->foreign('colecao_id')->references('id')->on('colecoes');
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
