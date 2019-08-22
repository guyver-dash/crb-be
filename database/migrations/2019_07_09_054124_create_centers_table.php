<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentersTable extends Migration
{
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collector_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            $table->timestamps();

            // $table->foreign('collector_id')->references('id')
            //     ->on('collectors');
        });
    }

    public function down()
    {
        Schema::dropIfExists('centers');
    }
}
