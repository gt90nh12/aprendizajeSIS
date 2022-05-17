<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->integer('id');
            $table->text('nombre');
            $table->text('apellido_paterno');
            $table->text('apellido_materno');
            $table->date('fecha_nacimiento');
            $table->string('sexo',9);
            $table->integer('celular');
            $table->integer('ci');
            $table->text('correo_electronico');
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
        Schema::dropIfExists('personas');
    }
}
