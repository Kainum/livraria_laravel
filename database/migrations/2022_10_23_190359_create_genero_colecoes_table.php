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
        Schema::create('collection_genre', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('genero_id')->constrained('genres');
            $table->foreignId('colecao_id')->constrained('collections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_genre');
    }
};
