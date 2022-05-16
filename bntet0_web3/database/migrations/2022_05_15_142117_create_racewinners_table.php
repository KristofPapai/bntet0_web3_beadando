<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racewinners', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->integer('riderID')->unsigned();
            $table->integer('gpID')->unsigned();
            $table->foreign('riderID')->references('id')->on('riders');
            $table->foreign('gpID')->references('id')->on('races');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racewinners');
    }
};
