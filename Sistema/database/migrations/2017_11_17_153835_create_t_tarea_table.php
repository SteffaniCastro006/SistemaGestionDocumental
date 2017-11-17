<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_tarea', function (Blueprint $table) {
            
            $table->increments('Cod');
            $table->string('Descripcion',100);
            $table->integer('t_actividad_cod')->unsigned();
            $table->foreign('t_actividad_cod')->references('Cod')->on('t_actividad')->onDelete('cascade');
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
        Schema::dropIfExists('t_tarea');
    }
}
