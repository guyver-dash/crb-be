<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('term_id');
            $table->integer('termable_id');
            $table->string('termable_type');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('no_of_days');
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
        Schema::dropIfExists('termables');
    }
}
