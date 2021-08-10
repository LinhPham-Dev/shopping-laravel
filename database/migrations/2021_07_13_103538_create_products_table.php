<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image', 200);
            $table->unsignedBigInteger('category_id');
            $table->string('slug');
            $table->float('price');
            $table->float('sale_price')->nullable()->default(0);
<<<<<<< HEAD
            $table->tinyInteger('status')->default(1);
=======
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
            $table->text('description');
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
