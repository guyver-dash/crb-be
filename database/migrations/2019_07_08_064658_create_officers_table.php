<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficersTable extends Migration
{
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('designation_id')->unsigned();
            $table->integer('branch_id')->unsigned()->nullable();
            $table->string('name');
            $table->boolean('isSignatory')->default(0);
            $table->timestamps();

            // $table->foreign('designation_id')
            //     ->references('id')->on('designations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('officers');
    }
}
