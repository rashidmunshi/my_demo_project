<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('product_type')->unsigned()->index()->comment('Refer product_types table');
            $table->integer('category_id')->unsigned()->index()->comment('Refer categories table');
            $table->string('name');
            $table->string('product_image');
            $table->string('details');
            $table->string('price');
            $table->string('qty');
            $table->Integer('status')->default('0');
            $table->Integer('is_hottest')->default('0');
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
