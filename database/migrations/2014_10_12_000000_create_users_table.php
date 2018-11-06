<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')
                ->on('address');
            $table->integer('personal_id')->unsigned()->nullable();
            $table->foreign('personal_id')->references('id')
                ->on('personal');
            $table->string('member_id')->unique()->nullable();
            $table->string('account_no')->unique()->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
