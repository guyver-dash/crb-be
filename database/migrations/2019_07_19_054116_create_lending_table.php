<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendingTable extends Migration
{
    public function up()
    {
        Schema::create('lending', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('subname');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lending');
    }
}
