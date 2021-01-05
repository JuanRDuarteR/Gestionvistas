<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('arete');
            $table->string('nombre');
            $table->string('lote');
            $table->string('raza');
            $table->string('origen');
            $table->date('fecha_inc');
            $table->date('fecha_nac');
            $table->integer('edad');
            $table->string('estatus');
            $table->string('usuario'); //Es el usuario al cual pertenecen los registros
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
        Schema::dropIfExists('vacas');
    }
}
