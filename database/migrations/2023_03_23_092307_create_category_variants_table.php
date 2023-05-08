<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->comment('Refer add_products table');
            $table->string('category_name');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('add_products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_variants');
    }
}
