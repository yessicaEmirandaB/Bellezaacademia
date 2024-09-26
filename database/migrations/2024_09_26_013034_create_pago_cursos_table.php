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
        Schema::create('pago_cursos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->string('usuario');
            $table->decimal('monto', 10, 2);
            $table->string('metodo_pago');
            $table->string('observacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago_cursos');
    }
};
