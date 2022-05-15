<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->string('username',6)->primary();
            $table->string('password',150);
            $table->tinyInteger('legitimacy')->default(0);
        });

        DB::table('users')->insert([
            'username'=>'admin',
            'password'=> Hash::make('admin'),
            'legitimacy' => 1,
        ]);
        DB::table('users')->insert([
            'username'=>'user',
            'password'=> Hash::make('user'),
            'legitimacy' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};