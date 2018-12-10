<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')
                ->on('companies');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->foreign('branch_id')->references('id')
                ->on('branches');
            $table->integer('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')
                ->on('branches');
            $table->string('name');
            $table->integer('discount');
            $table->integer('capable_supply');
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
        Schema::dropIfExists('vendors');
    }
}
