<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\DetalleCursoMateria;

class UniqueCursoMateriaHorario implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // dd(12);
        $data = request()->all();
        $exists = DetalleCursoMateria::where('id_curso', $data['id_curso'])
            ->where('id_materia', $data['id_materia'])
            ->where('id_horario', $data['id_horario'])
            ->exists();

        if ($exists) {
            $fail('La combinación de curso, materia y horario ya existe.');
        }
    }
}
