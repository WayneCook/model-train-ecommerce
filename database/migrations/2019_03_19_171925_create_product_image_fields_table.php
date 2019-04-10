<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input_name');
            $table->string('label');
            $table->string('field_type')->default('upload');
            $table->string('file_name')->default('default_product.jpg');
            $table->string('prefix');
            $table->string('tab')->default('Images');
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
        Schema::dropIfExists('product_image_fields');
    }
}
