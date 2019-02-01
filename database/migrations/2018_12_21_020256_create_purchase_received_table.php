<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseReceivedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_received', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchasable_id');
            $table->string('purchasable_type');
            $table->integer('purchase_id')->unsigned()->nullable();
            $table->foreign('purchase_id')->references('id')
                ->on('purchases');
            $table->integer('purchase_status_id')->unsigned()->nullable();
            $table->foreign('purchase_status_id')->references('id')
                    ->on('purchase_status');
            $table->date('received_date')->nullable();
            $table->decimal('freight')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('vat_total')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->string('invoice_no')->nullable();
            $table->integer('received_by')->unsigned()->nullable();
            $table->foreign('received_by')->references('id')
                ->on('users');
            $table->string('token')->nullable();
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
        Schema::dropIfExists('purchase_received');
    }
}
