<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('img')->nullable();
            $table->text('desc');
            $table->text('small_desc')->nullable();
            $table->integer('language_id')->unsigned();
            $table->string('slug')->unique()->nullable();
            $table->tinyInteger('sort')->nullable();
            $table->enum('status',['yes','no'])->default('yes');
            $table->enum('show_in_homePage',['yes','no'])->default('yes');
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
        Schema::dropIfExists('categories');
    }
}
