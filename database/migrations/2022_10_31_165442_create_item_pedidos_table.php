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
        Schema::create('item_pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('qtd')->unsigned();
            $table->double('valor_unitario');
            $table->double('valor_item');
            
            $table->foreignId('pedido_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_pedidos');
    }
};
