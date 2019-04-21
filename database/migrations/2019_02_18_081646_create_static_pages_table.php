<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img');
            $table->text('description');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('slug')->unique()->nullable();
            $table->tinyInteger('sort')->nullable();
            $table->enum('status',['yes','no'])->default('yes');
            $table->text('seo')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('static_pages');
    }
}
