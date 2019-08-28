<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{

    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chart_account_id')->unsigned();
            $table->string('details');
            $table->decimal('amount', 12, 2)->default(0);
            $table->integer('rate')->default(0);
            $table->timestamps();

            $table->foreign('chart_account_id')
                    ->references('id')->on('chart_accounts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('charges');
    }
}
