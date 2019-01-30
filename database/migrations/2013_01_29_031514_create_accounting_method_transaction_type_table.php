<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingMethodTransactionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_method_transaction_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accounting_method_id')->unsigned()->nullable();
            $table->foreign('accounting_method_id')->references('id')
                    ->on('accounting_methods');
            $table->integer('transaction_type_id')->unsigned()->nullable();
            $table->foreign('transaction_type_id')->references('id')
                    ->on('transaction_types');
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
        Schema::dropIfExists('accounting_method_transaction_type');
    }
}
