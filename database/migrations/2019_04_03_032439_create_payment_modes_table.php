<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentModesTable extends Migration
{
    public function up()
    {
        Schema::create('payment_modes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details');
            $table->integer('days');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_modes');
    }
}
