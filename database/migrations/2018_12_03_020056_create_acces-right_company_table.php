<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesRightCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_right_company', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_right_id')->unsigned()->nullable();
            $table->foreign('access_right_id')->references('id')
                ->on('access_rights');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')
                ->on('companies');
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
        Schema::dropIfExists('access_right_company');
    }
}
