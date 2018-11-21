<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRightMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_right_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_right_id')->unsigned()->nullable();
            $table->foreign('access_right_id')->references('id')
                ->on('access_rights');
            $table->integer('menu_id')->unsigned()->nullable();
            $table->foreign('menu_id')->references('id')
                ->on('menus');
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
        Schema::dropIfExists('access_right_menu');
    }
}
