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
            $table->tinyInteger('alumno_id')->after('observacion'); 
            $table->integer('curso_id')->after('alumno_id'); 

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
            $table->dropColumn('alumno_id');
            $table->dropColumn('curso_id');
        });
    }
};
