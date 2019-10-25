<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyagers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 100);
            $table->enum('type', ['chofer', 'pasajero'])->default('pasajero');
            $table->string('linea', 100);
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
        Schema::dropIfExists('voyagers');
    }
}
