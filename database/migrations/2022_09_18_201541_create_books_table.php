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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo', 100);
            $table->string('resumo', 1000);
            $table->string('isbn', 20);
            $table->string('autor', 100);
            $table->string('image')->nullable();
            $table->date('data_lancamento');
            $table->double('preco');
            $table->integer('paginas')->unsigned();
            $table->integer('qtd_estoque')->unsigned();

            $table->foreignId('publisher_id')->constrained('publishers');

            $table->foreignId('collection_id')->constrained('collections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
