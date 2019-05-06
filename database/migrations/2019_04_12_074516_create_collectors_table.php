<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->string('pos_number')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('cp_number')->nullable();
            $table->string('imei')->nullable();
            $table->string('orig_code')->nullable();
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
        Schema::dropIfExists('collectors');
    }
}
