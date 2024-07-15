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
        Schema::create('duracioncursos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            // $table->bigInteger('cursos_id')->unsigned();
            $table->string('fechaInicio',25);
            $table->string('fechaFin',25);

            // $table->foreign('cursos_id')
            // ->references('id')
            // ->on('cursos')
            // ->onDelete("cascade");

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duracioncursos');
    }
};
