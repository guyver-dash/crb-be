<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmortizationsTable extends Migration
{
    public function up()
    {
        Schema::create('amortizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id')->unsigned()->nullable();
            $table->date('payment_date')->nullable();
            $table->decimal('principal', 12, 2);
            $table->decimal('interest', 12, 2);
            $table->decimal('cbu', 12, 2)->default(0);
            $table->decimal('savings', 12, 2)->default(0);
            $table->decimal('other_payment', 12, 2)->default(0);
            $table->decimal('total_payment', 12, 2);
            $table->boolean('posted')->default(0);
            $table->date('date_paid')->nullable();
            $table->decimal('principal_pay', 12, 2)->default(0);
            $table->decimal('interest_pay', 12, 2)->default(0);
            $table->decimal('cbu_pay', 12, 2)->default(0);
            $table->decimal('savings_pay', 12, 2)->default(0);
            $table->decimal('other_payment_pay', 12, 2)->default(0);
            $table->decimal('balance', 12, 2);
            $table->integer('payment_sequence');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('amortizations');
    }
}
