<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTExpedienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_expediente', function (Blueprint $table) {
            $table->increments('Cod');
            $table->date('Fecha');
            $table->integer('t_estado_cod')->unsigned();
            $table->foreign('t_estado_cod')->references('Cod')->on('t_estado')->onDelete('cascade');
            $table->integer('t_proceso_flujo_cod')->unsigned();
            $table->foreign('t_proceso_flujo_cod')->references('Cod')->on('t_proceso_flujo')->onDelete('cascade');
            $table->integer('unidad_funcional_interna')->unsigned();
            $table->foreign('unidad_funcional_interna')->references('Cod')->on('t_unidad_funcional')->onDelete('cascade');
            $table->integer('unidad_funcional_externa')->unsigned();
            $table->foreign('unidad_funcional_externa')->references('Cod')->on('t_unidad_funcional')->onDelete('cascade');
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
        Schema::dropIfExists('t_expediente');
    }
}
