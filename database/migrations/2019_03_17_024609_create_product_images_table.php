<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('original_name')->default('default_product.jpg');
            $table->integer('product_id');
            $table->text('hash');
            $table->string('path')->default('images/product/');
            $table->integer('order')->nullable();
            $table->boolean('thumbnail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
