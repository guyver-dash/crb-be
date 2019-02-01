<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPurchaseRecievedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_purchase_recieved', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')
                ->on('items');
            $table->integer('purchase_received_id')->unsigned()->nullable();
            $table->foreign('purchase_received_id')->references('id')
                ->on('purchase_received');
            $table->integer('qty');
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('freight', 12, 2)->nullable();
            $table->decimal('sub_total', 12, 2)->nullable();
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
        Schema::dropIfExists('item_purchase_recieved');
    }
}
