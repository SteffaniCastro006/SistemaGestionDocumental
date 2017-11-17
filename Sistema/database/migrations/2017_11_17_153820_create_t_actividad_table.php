<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_actividad', function (Blueprint $table) {
            $table->increments('Cod');
            $table->string('Descripcion',100);
            $table->integer('Tiempo_Actividad')->unsigned();
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
        Schema::dropIfExists('t_actividad');
    }
}
