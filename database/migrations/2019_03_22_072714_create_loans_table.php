<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('cycle');
            $table->decimal('loan_amount', 12, 2);
            $table->decimal('rate', 12, 2);
            $table->decimal('interest', 12, 2);
            $table->integer('terms');
            $table->date('date_applied');
            $table->date('date_approved');
            $table->date('date_maturity');
            $table->integer('payment_mode_id')->unsigned()->nullable();
            $table->integer('loan_level_id')->unsigned()->nullable();
            $table->integer('loan_status_id')->unsigned()->nullable();
            $table->date('first_payment');
            $table->integer('grace');
            $table->date('date_release');
            $table->decimal('irr_rate', 12, 2);
            $table->integer('approved_by')->unsigned()->nullable();
            $table->integer('override_user')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('account_id')
            //     ->references('id')->on('accounts');

            // $table->foreign('payment_mode_id')
            //     ->references('id')->on('payment_modes');

            // $table->foreign('loan_level_id')
            //     ->references('id')->on('loan_levels');

            // $table->foreign('loan_status_id')
            //     ->references('id')->on('loan_status');

            // $table->foreign('approved_by')
            //     ->references('id')->on('users');

            // $table->foreign('override_user')
            //     ->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
