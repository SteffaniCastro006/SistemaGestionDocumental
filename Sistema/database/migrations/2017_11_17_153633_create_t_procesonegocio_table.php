<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTProcesonegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_procesonegocio', function (Blueprint $table) {
            $table->increments('Cod_referencia');
            $table->string('Nombre_Proceso',100);
            $table->string('Descripcion',100);
            $table->string('Ruta',100);
            $table->integer('t_datosproceso_cod')->unsigned();
            $table->foreign('t_datosproceso_cod')->references('Cod')->on('t_datosproceso')->onDelete('cascade');
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
        Schema::dropIfExists('t_procesonegocio');
    }
}
