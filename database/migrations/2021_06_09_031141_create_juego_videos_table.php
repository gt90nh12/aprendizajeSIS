<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegoVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juego_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('titulo',55);
            $table->text('imagen');
            $table->text('descripcion');
            $table->text('nivel');
            $table->integer('puntaje');
            $table->time('tiempo');
            $table->char('archivo_id',55);
            $table->json('preguntas');
            $table->integer('usuario_id');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
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
        Schema::dropIfExists('juego_videos');
    }
}
