<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->nullable();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('navigation')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->text('abstract')->nullable();
            $table->text('author')->nullable();
            $table->string('url')->nullable();
            $table->integer('hierarchy')->nullable();
            $table->boolean('sortability')->nullable();
            $table->boolean('visibility')->nullable();
            $table->boolean('multiplicity')->nullable();
            $table->boolean('removability')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_description')->nullable();
            $table->date('released_at')->nullable();
            $table->date('emitted_at')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
