<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecCalculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tec_calculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('titulo');
            $table->text('imagen');
            $table->text('descripcion');
            $table->text('anio_escolaridad');
            $table->text('escolaridad_paralelo');
            $table->text('nivel');
            $table->text('puntaje');
            $table->time('tiempo');
            $table->integer('curso_id');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->integer('usuario_id');
            $table->text('tabla_pregunta');
            $table->json('tabla_respuesta');
            $table->timestamps();
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tec_calculos');
    }
}
