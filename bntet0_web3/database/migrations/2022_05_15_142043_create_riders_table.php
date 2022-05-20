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
        Schema::create('riders', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('riderName',100);
            $table->integer('riderAge');
            $table->string('riderTeam',100);
        });

        DB::table('riders')->insert([
            'id'=>'1',
            'riderName'=>'Andrea Dovizioso',
            'riderAge'=> '30',
            'riderTeam'=> 'WithU Yamaha RNF MotoGP Team',
        ]);
        DB::table('riders')->insert([
            'id'=>'2',
            'riderName'=>'Maverick Vinales',
            'riderAge'=> '31',
            'riderTeam'=> 'Aprilia Racing',
        ]);
        DB::table('riders')->insert([
            'id'=>'3',
            'riderName'=>'Fabio Quartararo',
            'riderAge'=> '28',
            'riderTeam'=> 'Monster Energy Yamaha MotoGP',
        ]);

        DB::table('riders')->insert([
            'id'=>'4',
            'riderName'=>'Enea Bastianini',
            'riderAge'=> '26',
            'riderTeam'=> 'Gresini Racing MotoGP',
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riders');
    }
};
