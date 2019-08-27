<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('brand')->nullable();
            $table->string('scale')->nullable();
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->string('main_image', 250)->nullable();
            $table->string('original_image_name', 250)->nullable();
            $table->string('slug')->unique();
            $table->unique('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
