<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img');
            $table->double('price');
            $table->tinyInteger('offer')->nullable();
            $table->enum('show_in_homePage',['yes','no'])->default('no');
            $table->text('description');
            $table->text('small_description');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->string('slug')->unique()->nullable();
            $table->tinyInteger('sort')->nullable();
            $table->enum('status',['yes','no'])->default('yes');
            $table->text('seo')->nullable();
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
        Schema::dropIfExists('services');
    }
}
