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
        Schema::table('pago_cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('alumno_id')->after('observacion');
            $table->unsignedBigInteger('curso_id')->after('alumno_id'); // Asegúrate de usar unsignedBigInteger también

            // Agregar las claves foráneas
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pago_cursos', function (Blueprint $table) {
            // Primero eliminar las claves foráneas
            $table->dropForeign(['alumno_id']);
            $table->dropForeign(['curso_id']);

            // Luego eliminar las columnas
            $table->dropColumn('alumno_id');
            $table->dropColumn('curso_id');
        });
    }
};
