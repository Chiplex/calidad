<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attribute_id')->unsigned();
            $table->bigInteger('level_id')->unsigned();
            $table->timestamps();
            $table->foreign('attribute_id')->references('id')->on('attributes');
            $table->foreign('level_id')->references('id')->on('level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('values');
    }
}
