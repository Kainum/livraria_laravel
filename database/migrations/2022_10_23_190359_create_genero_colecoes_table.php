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
        Schema::create('genero_colecoes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->bigInteger('colecao_id')->unsigned();
            $table->foreign('colecao_id')->references('id')->on('colecoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genero_colecoes');
    }
};
