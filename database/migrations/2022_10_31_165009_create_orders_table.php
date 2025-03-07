<?php

use App\Enums\OrderStatusEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date')->nullable();
            $table->string('endereco', 1000)->nullable();
            $table->double('total_value')->nullable();
            $table->string('servicoFrete', 10)->nullable();
            $table->double('valorFrete')->nullable();
            $table->integer('status'); // ENUM
            $table->string('cpf', 14)->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreignId('client_id')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
