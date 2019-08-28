<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->integer('information_id')->unsigned()->nullable();
            $table->integer('savings_id')->unsigned()->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('information_id')->references('id')
                ->on('informations');

            $table->foreign('branch_id')->references('id')
                ->on('branches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
