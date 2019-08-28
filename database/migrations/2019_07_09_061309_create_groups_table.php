<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('center_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamps();

            // $table->foreign('center_id')->references('id')
            //     ->on('centers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
