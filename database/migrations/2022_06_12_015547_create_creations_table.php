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
            $table->string('creation_name')->nullable(false)->change();
            $table->text('creation_image')->nullable(false)->change();
            $table->string('creation_author')->default('Ẩn danh');
            $table->string('creation_type')->nullable(false)->change();
            $table->string('creation_source')->default('Internet');
            $table->integer('creation_status');
            $table->text('creation_description')->nullable(false)->change();
            $table->integer('creation_version')->default(1);
            $table->integer('creation_view')->default(0);
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
