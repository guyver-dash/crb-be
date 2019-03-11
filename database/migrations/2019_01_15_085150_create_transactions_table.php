<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transactable_id');
            $table->string('transactable_type');
            $table->integer('transaction_type_id')->unsigned()->nullable();
            $table->foreign('transaction_type_id')->references('id')
                ->on('transaction_types');
            $table->integer('chart_account_id')->unsigned()->nullable();
            $table->foreign('chart_account_id')->references('id')
                ->on('chart_accounts');
            $table->integer('payment_method_id')->unsigned()->nullable();
            $table->foreign('payment_method_id')->references('id')
                ->on('payment_methods');
            $table->string('refnum');
            $table->decimal('total_amount', 12, 2);
            $table->decimal('total_discount', 12, 2);
            $table->string('checknumber')->nullable();
            $table->string('remarks')->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->date('date_due')->nullable();
            $table->decimal('vatable_sales', 12, 2)->nullable();
            $table->decimal('vatexempt_sales', 12, 2)->nullable();
            $table->decimal('zerorated_sales', 12, 2)->nullable();
            $table->decimal('vat_amount', 12, 2)->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')
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
        Schema::dropIfExists('transactions');
    }
}
