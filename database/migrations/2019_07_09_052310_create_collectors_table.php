<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectorsTable extends Migration
{
    public function up()
    {
        Schema::create('collectors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('information_id')->unsigned()->nullable();
            $table->integer('branch_id')->unsigned()->nullable();
            $table->string('imei')->nullable();
            $table->timestamps();

            // $table->foreign('information_id')->references('id')
            //     ->on('informations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('collectors');
    }
}
