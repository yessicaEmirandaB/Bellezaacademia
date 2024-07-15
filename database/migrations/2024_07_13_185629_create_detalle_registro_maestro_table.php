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
        Schema::create('detalle_registro_maestros', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_detalle_curso_maestro')->unsigned();
            $table->bigInteger('id_detalle_curso_materia')->unsigned();

            $table->foreign('id_detalle_curso_maestro')->references('id')->on('detalle_curso_maestros')->onDelete("cascade");
            $table->foreign('id_detalle_curso_materia')->references('id')->on('detalle_curso_materias')->onDelete("cascade");

            // Añadir la clave única compuesta
            $table->unique(['id_detalle_curso_maestro', 'id_detalle_curso_materia'], 'unique_detalle_registro_maestros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_registro_maestros');
    }
};
