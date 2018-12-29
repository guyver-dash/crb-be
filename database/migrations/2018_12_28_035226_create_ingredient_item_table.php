<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->unsigned()->nullable();
            $table->foreign('ingredient_id')->references('id')
                ->on('ingredients');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')
                ->on('items');
            $table->integer('qty');
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
        Schema::dropIfExists('ingredient_item');
    }
}
