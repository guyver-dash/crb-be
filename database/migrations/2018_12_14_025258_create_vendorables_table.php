<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("item_id");
            $table->integer("vendorable_id");
            $table->string("vendorable_type");
            $table->integer('rank');
            $table->integer('dis_percentage');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price');
            $table->integer('volume');
            $table->decimal('freight');
            $table->integer('terms');
            $table->longText('remarks');
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')
                ->on('users');
                $table->integer('approved_by')->unsigned()->nullable();
                $table->foreign('approved_by')->references('id')
                    ->on('users');
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
        Schema::dropIfExists('vendorables');
    }
}
