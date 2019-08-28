<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('loan_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loan_levels');
    }
}
