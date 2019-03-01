<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salable_id');
            $table->string('salable_type');
            $table->integer('purchase_id')->unsigned()->nullable();
            $table->foreign('purchase_id')->references('id')
                ->on('purchases');
            $table->integer('purchase_status_id')->unsigned()->nullable();
            $table->foreign('purchase_status_id')->references('id')
                ->on('purchase_status');
            $table->integer('chart_account_id')->unsigned()->nullable();
            $table->foreign('chart_account_id')->references('id')
                ->on('chart_accounts');
            $table->date('received_date')->nullable();
            $table->decimal('freight')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('vat_total')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->string('invoice_no')->nullable();
            $table->integer('received_by')->unsigned()->nullable();
            $table->foreign('received_by')->references('id')
                ->on('users');
            $table->string('token')->nullable();
            $table->date('date_due');
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
        Schema::dropIfExists('sale_invoices');
    }
}
