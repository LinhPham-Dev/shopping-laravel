<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
<<<<<<< HEAD
            $table->string('slug');
            $table->tinyInteger('status')->comment('1 is visible, 0 is hidden');
=======
            $table->tinyInteger('status')->comment('1 is visible, 0 is hidden');
            $table->tinyInteger('priority')->default(0);
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
