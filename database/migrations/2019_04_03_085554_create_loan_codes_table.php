<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanCodesTable extends Migration
{
    public function up()
    {
        Schema::create('loan_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_categories_id')->unsigned();
            $table->string('amortized')->nullable();
            $table->string('method')->nullable();
            $table->decimal('loan_plty_rate', 5, 2)->nullable();
            $table->decimal('loan_pdi_rate', 5, 2)->nullable();
            $table->decimal('amort_plty_rate', 5, 2)->nullable();
            $table->decimal('amort_pdi_rate', 5, 2)->nullable();
            $table->string('interest_style')->nullable();
            $table->string('penalty_style')->nullable();
            $table->decimal('idiv', 5, 0)->nullable();
            $table->decimal('pdiv', 5, 0)->nullable();
            $table->string('delq')->nullable();
            $table->string('rebate')->nullable();
            $table->decimal('computation_amount', 19, 2)->nullable();
            $table->decimal('rdiv', 5, 0)->nullable();
            $table->string('pastdue_penalty_style')->nullable();
            $table->decimal('pddiv', 5, 0)->nullable();
            $table->decimal('coaacctcode',18, 0);
            $table->decimal('coaacctcode2',18, 0);
            $table->decimal('coaacctcode3',18, 0)->nullable();
            $table->decimal('coaacctcode4',18, 0)->nullable();
            $table->decimal('coaacctcode5',18, 0)->nullable();
            $table->decimal('coaacctcode6',18, 0)->nullable();
            $table->decimal('coaacctcode7',18, 0)->nullable();
            $table->decimal('coaacctcode8',18, 0)->nullable();
            $table->decimal('coaacctcode9',18, 0)->nullable();
            $table->boolean('bt_is_uid')->nullable();
            $table->string('vc_finance')->nullable();
            $table->boolean('bt_past_due')->nullable();
            $table->integer('distribution_style')->nullable();
            $table->boolean('auto_transfer')->nullable();
            $table->string('sub_code')->nullable();
            $table->decimal('coa_service_charge',18, 0)->nullable();
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
        Schema::dropIfExists('loan_codes');
    }
}
