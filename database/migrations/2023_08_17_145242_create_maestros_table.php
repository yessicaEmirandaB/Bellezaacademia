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
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos',50);
            $table->string('nombres',50);
            $table->string('ci',10)->unique();
            $table->string('direccion',50);
           /* $table->string('materia',50); */
            $table->string('celular',10);
            $table->string('correo',50)->nullable();
            $table->string('Foto');
            $table->string('especialidad');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
