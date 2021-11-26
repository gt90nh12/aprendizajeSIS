<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_persona');
            $table->text('rda');
            $table->text('especialidad');
            $table->text('resumen');
            $table->text('reconocimiento');
            $table->json('formacion_academica');
            $table->json('experiencia_laboral');
            $table->json('cursos_seminarios');
            $table->json('otros_estudios');
            $table->json('tic_educacion');
            $table->integer('experiencia');
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
        Schema::dropIfExists('docentes');
    }
}
