<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductByColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_by_colors', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned()->index()->comment('Refer products table');
            $table->integer('color_id')->unsigned()->index()->comment('Refer colors table');
            $table->integer('size')->unsigned()->index()->comment('Refer sizes table');
            $table->string('price');
            $table->string('qty');
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
        Schema::dropIfExists('product_by_colors');
    }
}
