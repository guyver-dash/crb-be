<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('sub_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('isOtherAgricultural')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_projects');
    }
}
