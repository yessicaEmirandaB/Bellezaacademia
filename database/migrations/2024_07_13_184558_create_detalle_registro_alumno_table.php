<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_registro_alumnos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_detalle_alumno_curso')->unsigned();
            $table->bigInteger('id_detalle_curso_materia')->unsigned();

            $table->foreign('id_detalle_alumno_curso')->references('id')->on('alumnoscursos')->onDelete("cascade");
            $table->foreign('id_detalle_curso_materia')->references('id')->on('detalle_curso_materias')->onDelete("cascade");

            $table->timestamps();

            // Añadir la clave única compuesta
            $table->unique(['id_detalle_alumno_curso', 'id_detalle_curso_materia'], 'unique_detalle_registro_alumnos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_registro_alumnos');
    }
};
