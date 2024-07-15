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
        Schema::create('detalle_curso_materias', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_curso')->unsigned();
            $table->bigInteger('id_materia')->unsigned();
            $table->bigInteger('id_horario')->unsigned();

            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete("cascade");
            $table->foreign('id_materia')->references('id')->on('materias')->onDelete("cascade");
            $table->foreign('id_horario')->references('id')->on('horarios')->onDelete("cascade");

            $table->timestamps();

            // Añadir la clave única compuesta
            $table->unique(['id_curso', 'id_materia', 'id_horario'], 'unique_detalle_curso_materias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_curso_materias');
    }
};
