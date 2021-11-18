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
            $table->bigIncrements('id');
            $table->string('pro_name');
            $table->integer('cat_id');
            $table->integer('quanty');
            $table->integer('sale_price');
            $table->integer('promotional_price');
            $table->string('image_path');
            $table->string('image_name');
            $table->longText('description', 500);
            $table->longText('content');
            $table->integer('provider_id');
            $table->integer('user_id');
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
