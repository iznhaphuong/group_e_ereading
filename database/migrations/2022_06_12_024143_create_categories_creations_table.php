<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_creations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creation_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('creation_id')->references('id')->on('creations')->onDelete('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
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
        Schema::dropIfExists('categories_creations');
    }
}
