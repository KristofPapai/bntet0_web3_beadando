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
        Schema::create('races', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('gpName',100);
            $table->string('gpLocation',100);
        });


        DB::table('races')->insert([
            'id'=>'1',
            'gpName'=>'Grand Prix of Qatar',
            'gpLocation'=> 'Lusail International Circuit',
        ]);
        DB::table('races')->insert([
            'id'=>'2',
            'gpName'=>'Pertamina Grand Prix of Indonesia',
            'gpLocation'=> 'Pertamina Mandalika Circuit',
        ]);
        DB::table('races')->insert([
            'id'=>'3',
            'gpName'=>'Gran Premio Michelin® de la República Argentina',
            'gpLocation'=> 'Termas de Río Hondo',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
};
