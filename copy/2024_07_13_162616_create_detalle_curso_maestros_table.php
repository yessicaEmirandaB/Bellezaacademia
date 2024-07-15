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
        Schema::create('detalle_curso_maestros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maestros_id')->nullable()->constrained('maestros')->nullOnDelete();
            $table->foreignId('cursos_id')->nullable()->constrained('cursos')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_curso_maestros');
    }
};
