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
            $table->integer('categories_id');
            $table->integer('sub_categories_id');
            $table->string('brand')->nullable();
            $table->string('scale')->nullable();
            $table->text('description');
            $table->text('images');
            $table->integer('price');
            $table->integer('stock');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
