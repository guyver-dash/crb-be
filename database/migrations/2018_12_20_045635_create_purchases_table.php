<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('purchasable_id');
            $table->string('purchasable_type');
            $table->integer('purchase_no')->nullable();
            $table->integer('purchase_status_id')->unsigned()->nullable();
            $table->foreign('purchase_status_id')->references('id')
                ->on('purchase_status');
            $table->integer('prepared_by')->unsigned()->nullable();
            $table->foreign('prepared_by')->references('id')
                ->on('users');
            $table->date('noted_date')->nullable();
            $table->integer('noted_by')->unsigned()->nullable();
            $table->foreign('noted_by')->references('id')
                ->on('users');
            $table->date('approved_date')->nullable();
            $table->integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')->references('id')
                ->on('users');
            $table->date('order_date')->nullable();
            $table->date('shipped_date')->nullable();
            $table->decimal('freight')->nullable();
            $table->decimal('sub_total')->nullable();
            $table->decimal('vat_total')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->string('invoice_no')->nullable();
            $table->date('received_date')->nullable();
            $table->integer('received_by')->unsigned()->nullable();
            $table->foreign('received_by')->references('id')
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
        Schema::dropIfExists('purchases');
    }
}
