<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleInvoiceTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoice_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('pay', 12, 2);
            $table->integer('sale_invoice_id')->unsigned()->nullable();
            $table->foreign('sale_invoice_id')->references('id')
                ->on('sale_invoices');
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->foreign('transaction_id')->references('id')
                ->on('transactions');
            $table->integer('job_id')->unsigned()->nullable();
            $table->foreign('job_id')->references('id')
                ->on('jobs');
            $table->decimal('amount_due', 12, 2);
            $table->decimal('amount_paid', 12, 2);
            $table->date('date_due', 12, 2);
            $table->string('description')->nullable();
            $table->decimal('discount', 12, 2);
            $table->decimal('vat_amount', 12, 2);
            $table->decimal('vat_exempt_sales', 12, 2);
            $table->decimal('vatable_sales', 12, 2);
            $table->decimal('zero_rated_sales', 12, 2);
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
        Schema::dropIfExists('sale_invoice_transaction');
    }
}
