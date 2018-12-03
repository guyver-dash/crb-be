<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRightHoldingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_right_holding', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_right_id')->unsigned()->nullable();
            $table->foreign('access_right_id')->references('id')
                ->on('access_rights');
            $table->integer('holding_id')->unsigned()->nullable();
            $table->foreign('holding_id')->references('id')
                ->on('holdings');
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
        Schema::dropIfExists('access_right_holding');
    }
}
