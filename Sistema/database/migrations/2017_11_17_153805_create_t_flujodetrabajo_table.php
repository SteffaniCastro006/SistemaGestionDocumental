<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTFlujodetrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_flujodetrabajo', function (Blueprint $table) {
            $table->increments('Cod');
            $table->string('Nombre',100);
            $table->integer('t_user_cod')->unsigned();
            $table->foreign('t_user_cod')->references('id')->on('users')->onDelete('cascade');
            $table->integer('t_procesonegocio_cod')->unsigned();
            $table->foreign('t_procesonegocio_cod')->references('Cod_referencia')->on('t_procesonegocio')->onDelete('cascade');
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
        Schema::dropIfExists('t_flujodetrabajo');
    }
}
