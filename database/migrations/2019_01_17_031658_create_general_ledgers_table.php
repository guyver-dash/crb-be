<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ledgerable_id');
            $table->string('ledgerable_type');
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->foreign('transaction_id')->references('id')
                ->on('transactions');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')
                ->on('items');
            $table->integer('qty')->nullable();
            $table->longText('particulars')->nullable();
            $table->integer('chart_account_id')->unsigned()->nullable();
            $table->foreign('chart_account_id')->references('id')
                ->on('chart_accounts');
            $table->decimal('debit_amount')->default(0);
            $table->decimal('credit_amount')->default(0);
            $table->decimal('tax')->default(0);
            $table->boolean('is_posted')->nullable();
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
        Schema::dropIfExists('general_ledgers');
    }
}
