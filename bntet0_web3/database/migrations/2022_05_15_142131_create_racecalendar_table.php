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
        Schema::create('racecalendar', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('gpID')->unsigned();
            $table->string('gpDate',100);
        });

        DB::table('racecalendar')->insert([
            'id'=>'1',
            'gpID'=>'1',
            'gpDate'=> 'Mar 06',
        ]);
        DB::table('racecalendar')->insert([
            'id'=>'2',
            'gpID'=>'2',
            'gpDate'=> 'Mar 20',
        ]);
        DB::table('racecalendar')->insert([
            'id'=>'3',
            'gpID'=>'3',
            'gpDate'=> 'Apr 03',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racecalendar');
    }
};
