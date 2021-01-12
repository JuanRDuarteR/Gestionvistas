<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('arete_vaca')->unsigned();//Campo para relacion de tablas
            //$table->string('arete_vaca');
            $table->date('fecha');
            $table->string('enfermedad');
            $table->string('tratamiento');
            $table->string('encargado');
            $table->string('estado');
            $table->string('usuario');
            $table->timestamps();

            //Relacion
            $table->foreign('arete_vaca')->references('id')->on('vacas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermedads');
    }
}
