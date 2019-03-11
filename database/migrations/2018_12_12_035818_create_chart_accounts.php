<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')
                ->on('companies');
            $table->integer('taccount_id')->unsigned()->nullable();
            $table->foreign('taccount_id')->references('id')
                ->on('taccounts');
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->integer('account_code')->nullable();
            $table->string('account_display');
            $table->longText('remarks')->nullable();
            $table->integer('accounting_standard_id')->unsigned()->nullable();
            $table->foreign('accounting_standard_id')->references('id')
                ->on('accounting_standards');
            
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
        Schema::dropIfExists('chart_accounts');
    }
}
