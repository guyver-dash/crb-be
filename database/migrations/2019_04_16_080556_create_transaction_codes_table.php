<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionCodesTable extends Migration
{

    public function up()
    {
        Schema::create('transaction_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chart_account_id')->unsigned()->nullable();
            $table->string('details');
            $table->string('symbol');
            $table->timestamps();

            $table->foreign('chart_account_id')
                ->references('id')->on('chart_accounts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_codes');
    }
}
