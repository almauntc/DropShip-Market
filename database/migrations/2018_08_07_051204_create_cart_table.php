<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('dropshipper_id');
            $table->string('name_product');
            $table->string('code_product');
            $table->string('color_product');
            $table->string('size');
            $table->float('price_retail');
            $table->float('price_reseller');
            $table->float('profit');
            $table->integer('quantity');
            $table->string('dropshipper_email');
            $table->string('session_id');
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
       Schema::dropIfExists('carts');
    }
}
