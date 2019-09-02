<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundersTable extends Migration
{
    public function up()
    {
        Schema::create('funders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('sub_name')->nullable();
            $table->timestamps();

            $table->foreign('branch_id')->references('id')
                ->on('branches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('funders');
    }
}
