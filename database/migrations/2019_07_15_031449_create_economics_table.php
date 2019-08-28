<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEconomicsTable extends Migration
{
    public function up()
    {
        Schema::create('economics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->boolean('isAgricultural')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('economics');
    }
}
