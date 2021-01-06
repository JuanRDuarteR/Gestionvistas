<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bajas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('vaca_id')->unsigned();
            $table->string('nombre');
            $table->string('lote');
            $table->string('raza');
            $table->string('origen');
            $table->date('fecha_inc');
            $table->date('fecha_nac');
            $table->integer('edad');
            $table->date('fecha_baja');
            $table->string('motivo');
            $table->foreign('vaca_id')->references('id')->on('vacas')->onDelete('cascade');
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
        Schema::dropIfExists('bajas');
    }
}
