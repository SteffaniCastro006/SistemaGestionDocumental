<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTProcesoFlujoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_proceso_flujo', function (Blueprint $table) {
            $table->increments('Cod');
            $table->integer('t_procesonegocio_cod')->unsigned();
            $table->foreign('t_procesonegocio_cod')->references('Cod_referencia')->on('t_procesonegocio')->onDelete('cascade');
            $table->integer('t_flujodetrabajo_cod')->unsigned();
            $table->foreign('t_flujodetrabajo_cod')->references('Cod')->on('t_flujodetrabajo')->onDelete('cascade');
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
        Schema::dropIfExists('t_proceso_flujo');
    }
}
