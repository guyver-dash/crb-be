<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('daily_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_number');
            $table->integer('chart_account_id')->unsigned();
            $table->decimal('credit', 12, 2)->default(0);
            $table->decimal('debit', 12, 2)->default(0);
            $table->string('particulars')->nullable();
            $table->integer('transaction_type_id')->unsigned();
            $table->integer('teller_id');
            $table->integer('branch_id')->unsigned();
            $table->integer('sequence_number');
            $table->boolean('error_correct')->default(0);

            $table->timestamps();

            $table->foreign('chart_account_id')
                    ->references('id')->on('chart_accounts');

            // $table->foreign('transaction_type_id')->references('id')
            //         ->on('transaction_types');

            // $table->foreign('branch_id')->references('id')
            //         ->on('branches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_transactions');
    }
}
