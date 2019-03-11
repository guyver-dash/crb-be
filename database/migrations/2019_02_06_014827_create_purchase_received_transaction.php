<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseReceivedTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_received_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('pay', 12, 2);
            $table->integer('purchase_received_id')->unsigned()->nullable();
            $table->foreign('purchase_received_id')->references('id')
                ->on('purchase_received');
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
        Schema::dropIfExists('purchase_received_transaction');
    }
}
