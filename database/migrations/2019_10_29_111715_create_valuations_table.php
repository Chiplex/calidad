<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valuations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('utility_id')->unsigned();
            $table->bigInteger('quality_id')->unsigned();
            $table->bigInteger('value_id')->unsigned();
            $table->timestamps();
            $table->foreign('utility_id')->references('id')->on('utilities');
            $table->foreign('quality_id')->references('id')->on('quality');
            $table->foreign('value_id')->references('id')->on('values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valuations');
    }
}
