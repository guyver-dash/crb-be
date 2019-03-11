<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaleInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale_invoice', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')
                ->on('products');
            $table->integer('sale_invoice_id')->unsigned()->nullable();
            $table->foreign('sale_invoice_id')->references('id')
                ->on('sale_invoices');
            $table->integer('qty');
            $table->decimal('discount', 12, 2)->nullable()->default(0);
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('freight', 12, 2)->nullable();
            $table->decimal('sub_total', 12, 2)->nullable();
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
        Schema::dropIfExists('product_sale_invoice');
    }
}
