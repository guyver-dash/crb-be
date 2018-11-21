<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gender_id')->unsigned()->nullable();
            $table->foreign('gender_id')->references('id')->on('gender');
            $table->date('birthdate');
            $table->string('mobile');
            $table->string('nationality');
            $table->string('employee_id');
            $table->integer('civil_status_id')->unsigned()->nullable();
            $table->foreign('civil_status_id')->references('id')->on('civil_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informations');
    }
}
