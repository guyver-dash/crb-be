<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chart_account_id')->unsigned()->nullable();
            $table->foreign('chart_account_id')->references('id')
                ->on('chart_accounts');
            $table->string('sku');
            $table->bigInteger('barcode');
            $table->string('name');
            $table->longText('desc');
            $table->decimal('price', 12, 2);
            $table->integer('qty');
            $table->decimal('tax', 12, 2)->nullable();
            $table->integer('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')
                ->on('packages');
            $table->integer('minimum');
            $table->integer('maximum');
            $table->integer('reorder_level');
            $table->integer("itemable_id");
            $table->string("itemable_type");
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
        Schema::dropIfExists('items');
    }
}
