<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLmmcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lmmcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('ilacategory')->nullable();
            $table->boolean('isMicro')->nullable();
            $table->integer('misAmort')->nullable();
            $table->integer('parent_id');
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
        Schema::dropIfExists('lmmcategories');
    }
}
