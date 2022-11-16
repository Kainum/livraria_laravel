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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_pedido');
            $table->string('endereco', 1000);
            $table->double('valorTotal',8,2);
            $table->string('servicoFrete', 10);
            $table->double('valorFrete',8,2);
            $table->string('status', 3);
            $table->bigInteger('comprador_id')->unsigned();
            $table->foreign('comprador_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
