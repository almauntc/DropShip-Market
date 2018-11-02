<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id');
            $table->integer('dropshipper_id');
            $table->string('name_product');
            $table->string('code_product');
            $table->string('color_product');
            $table->string('size');
            $table->string('dropshipper_payment_status');
            $table->string('customer_delivery_status');
            $table->string('customer_payment_status');
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
        Schema::dropIfExists('sales');
    }
}
