<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_id')->unsigned()->nullable();
            $table->foreign('purchase_id')->references('id')
                ->on('purchases');
            $table->integer('salable_id');
            $table->string('salable_type');
            $table->string('invoice_no')->nullable();
            $table->date('ship_date')->nullable();
            $table->decimal('freight')->nullable();
            $table->decimal('sub_total')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->decimal('discount', 12, 2);
            $table->decimal('vat_amount', 12, 2);
            $table->integer('created_by_id')->unsigned()->nullable();
            $table->foreign('created_by_id')->references('id')
                ->on('users');
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
        Schema::dropIfExists('sale_orders');
    }
}
