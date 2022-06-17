<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->integer('chapter_number')->nullable(false);
            $table->string('chapter_name',100)->unique()->nullable(false);
            $table->text('chapter_content')->nullable(false);
            $table->unsignedBigInteger('creation_id');
            $table->integer('chapter_version')->default(1);;
            $table->foreign('creation_id')->references('id')->on('creations')->onDelete('cascade');;
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
        Schema::dropIfExists('chapters');
    }
}
