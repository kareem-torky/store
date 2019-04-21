<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');


            $table->string('name');
            $table->string('code')->unique();
            $table->string('img');
            $table->double('price');
            $table->tinyInteger('offer')->nullable();
            $table->enum('show_in_homePage',['yes','no'])->default('no');
            $table->enum('show_in_footer',['yes','no'])->default('no');
            $table->enum('featured',['yes','no'])->default('no');
            $table->text('desc');
            $table->text('small_desc');
            $table->string('slug')->unique()->nullable();
            $table->tinyInteger('sort')->nullable();
            $table->enum('status',['yes','no'])->default('yes');
            $table->text('seo')->nullable();
            $table->text('images')->nullable();
            $table->text('sizes')->nullable();
            $table->text('colors')->nullable();

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
        Schema::dropIfExists('products');
    }
}
