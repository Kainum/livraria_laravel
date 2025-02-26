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
            $table->string('product_name', 100);
            $table->string('synopsis', 1000);
            $table->string('isbn', 20);
            $table->string('author', 100);
            $table->string('image')->nullable();
            $table->string('slug', 200)->unique();
            $table->date('release_date');
            $table->double('price');
            $table->integer('page_number')->unsigned();
            $table->integer('qty_in_stock')->unsigned();
            $table->timestamps();
            $table->softDeletes();

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
