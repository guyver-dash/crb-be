<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleOrderCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_order_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_order_id')->unsigned()->nullable();
            $table->foreign('sale_order_id')->references('id')
                ->on('sale_orders');
            $table->integer('orderable_id');
            $table->string('orderable_type');
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
        Schema::dropIfExists('sale_order_customer');
    }
}
