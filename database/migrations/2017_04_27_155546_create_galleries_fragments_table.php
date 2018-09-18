<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesFragmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries_fragments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->nullable();
            $table->integer('photo_id')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
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
        Schema::dropIfExists('galleries_fragments');
    }
}
