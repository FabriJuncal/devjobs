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
        Schema::table('users', function (Blueprint $table) {
            //Se crea el campo "rol" de tipo "Integer" en la tabla "users"
            $table->integer('rol'); // 1 = Dev, 2 = Recruiter
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //Elimina el campo "rol" de la tabla "users"
            $table->dropColumn('rol');
        });
    }
};
