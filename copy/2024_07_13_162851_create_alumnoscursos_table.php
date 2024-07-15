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
        Schema::create('alumnoscursos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('Alumnos_id');
            $table->foreign('Alumnos_id')->references('id')->on('Alumnos')->onDelete('cascade');
            $table->unsignedBigInteger('cursos_id');
            $table->foreign('cursos_id')->references('id')->on('cursos')->onDelete('cascade');

            $table->string('Calificacion',10);
            $table->string('Estado',10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnoscursos');
    }
};
