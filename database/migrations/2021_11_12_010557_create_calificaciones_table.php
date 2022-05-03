<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre_prueba_tecnica');
            $table->text('id_prueba_tecnica');
            $table->time('tiempo');
            $table->decimal('puntaje',5,2);
            $table->text('rude');
            $table->text('comentario');
            $table->decimal('memoria',5,2)->nullable();
            $table->decimal('concentracion',5,2)->nullable();
            $table->decimal('calculo',5,2)->nullable();

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
        Schema::dropIfExists('calificaciones');
    }
}
