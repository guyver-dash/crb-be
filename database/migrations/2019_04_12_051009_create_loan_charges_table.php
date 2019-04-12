<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanChargesTable extends Migration
{
    public function up()
    {
        Schema::create('loan_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('charge_id')->unsigned();
            $table->integer('loan_id')->unsigned();
            $table->decimal('amount', 12, 2);
            $table->timestamps();

            $table->foreign('charge_id')
                ->references('id')->on('charges');

            $table->foreign('loan_id')
                ->references('id')->on('loans');
        });
    }

    public function down()
    {
        Schema::dropIfExists('loan_charges');
    }
}
