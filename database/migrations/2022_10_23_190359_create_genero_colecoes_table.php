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
            $table->timestamps();
            $table->foreignId('genero_id')->constrained('generos');
            $table->foreignId('colecao_id')->constrained('colecoes');
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
