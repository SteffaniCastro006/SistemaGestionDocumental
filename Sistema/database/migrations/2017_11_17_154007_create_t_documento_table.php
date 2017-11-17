<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_documento', function (Blueprint $table) {
            $table->increments('Cod');
            $table->string('Nombre',100);
            $table->integer('t_expediente_cod')->unsigned();
            $table->foreign('t_expediente_cod')->references('Cod')->on('t_expediente')->onDelete('cascade');
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
        Schema::dropIfExists('t_documento');
    }
}
