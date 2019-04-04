<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceTable extends Migration
{
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id')->unsigned()->nullable();
            $table->decimal('principal_balance', 12, 2);
            $table->decimal('interest_balance', 12, 2);
            $table->date('last_movement_principal')->nullable();
            $table->date('last_movement_interest')->nullable();
            $table->timestamps();

            // $table->foreign('loan_id')
            //     ->references('id')->on('loans');
        });
    }

    public function down()
    {
        Schema::dropIfExists('balances');
    }
}
