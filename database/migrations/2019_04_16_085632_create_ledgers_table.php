<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id');
            $table->integer('teller_id');
            $table->integer('transaction_code_id');
            $table->decimal('credit', 12, 2)->default(0);
            $table->decimal('debit', 12, 2)->default(0);
            $table->decimal('principal', 12, 2)->default(0);
            $table->decimal('interest', 12, 2)->default(0);
            $table->decimal('cbu', 12, 2)->default(0);
            $table->decimal('savings', 12, 2)->default(0);
            $table->decimal('other_payment', 12, 2)->default(0);
            $table->decimal('penalty_interest', 12, 2)->default(0);
            $table->decimal('penalty_due', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->string('reference_number');
            $table->boolean('error_correct')->default(0);
            $table->decimal('principal_balance', 12, 2)->default(0);
            $table->decimal('interest_balance', 12, 2)->default(0);
            $table->integer('sequence_number');
            $table->string('particulars');
            $table->string('manual_or')->nullable();
            $table->timestamps();

            // $table->foreign('loan_id')
            //     ->references('id')->on('loans');

            // $table->foreign('transaction_code_id')
            //     ->references('id')->on('transaction_codes');

            // $table->foreign('teller_id')
            //     ->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}
