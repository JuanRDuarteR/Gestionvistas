<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('arete_vaca')->unsigned();//Campo para relacion de tablas
            //$table->string('arete_vaca');
            $table->date('fecha');
            $table->integer('peso');
            $table->string('raza');
            $table->string('encargado');
            $table->string('estado');
            $table->string('sexo');
            $table->string('usuario'); //Es el usuario al cual pertenecen los registros
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
        Schema::dropIfExists('partos');
    }
}
