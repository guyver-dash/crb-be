<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('loan_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loancategory_id')->unsigned()->nullable();
            $table->integer('officer_id')->unsigned()->nullable();
            $table->integer('collector_id')->unsigned()->nullable();
            $table->integer('groups_id')->unsigned()->nullable();
            $table->integer('barangay_id')->unsigned()->nullable();
            $table->integer('lending_id')->unsigned()->nullable();
            $table->integer('office_id')->unsigned()->nullable();
            $table->integer('economic_id')->unsigned()->nullable();
            $table->integer('subproject_id')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('loancategory_id')
            //     ->references('id')->on('loan_categories');
            // $table->foreign('officer_id')
            //     ->references('id')->on('officers');
            // $table->foreign('collector_id')
            //     ->references('id')->on('collectors');
            // $table->foreign('groups_id')
            //     ->references('id')->on('groups');
            // $table->foreign('barangay_id')
            //     ->references('id')->on('barangays');
            // $table->foreign('lending_id')
            //     ->references('id')->on('lendings');
            // $table->foreign('office_id')
            //     ->references('id')->on('offices');
            // $table->foreign('economic_id')
            //     ->references('id')->on('economics');
            // $table->foreign('subproject_id')
            //     ->references('id')->on('subprojects');
        });
    }

    public function down()
    {
        Schema::dropIfExists('loan_groups');
    }
}
