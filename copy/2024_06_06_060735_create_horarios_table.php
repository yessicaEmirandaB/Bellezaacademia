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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('Aulas_id')->nullable()->constrained('Aulas')->nullOnDelete();
            // $table->foreignId('Materias_id')->nullable()->constrained('materias')->nullOnDelete();
            $table->bigInteger('id_aula')->unsigned();

            $table->foreign('id_aula')->references('id')->on('aulas')->onDelete("cascade");
            $table->string('HoraInicio',20);
            $table->string('HoraFinal',20);

              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
