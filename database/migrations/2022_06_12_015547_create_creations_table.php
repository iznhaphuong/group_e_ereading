<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->change();
            $table->text('image')->nullable(false)->change();
            $table->string('author')->default('Ẩn danh');
            $table->string('type')->nullable(false)->change();
            $table->string('source')->default('Internet');
            $table->integer('status');
            $table->text('description')->nullable(false)->change();
            $table->integer('version')->default(1);
            $table->integer('view')->default(0);
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
        Schema::dropIfExists('creations');
    }
}
