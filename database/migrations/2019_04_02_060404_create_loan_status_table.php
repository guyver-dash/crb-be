<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanStatusTable extends Migration
{
    public function up()
    {
        Schema::create('loan_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loan_status');
    }
}
