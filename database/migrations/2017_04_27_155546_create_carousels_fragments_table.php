<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselsFragmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels_fragments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carousel_id')->nullable();
            $table->integer('photo_id')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('url')->nullable();
            $table->integer('hierarchy')->nullable();
            $table->boolean('visibility')->nullable();
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
        Schema::dropIfExists('carousels_fragments');
    }
}
