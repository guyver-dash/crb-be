<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('businessable_id');
            $table->string('businessable_type');
            $table->integer('business_type_id')->unsigned()->nullable();
            $table->foreign('business_type_id')->references('id')
                ->on('business_types');
            $table->integer('vat_type_id')->unsigned()->nullable();
            $table->foreign('vat_type_id')->references('id')
                ->on('vat_types');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('tin')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('business_infos');
    }
}
