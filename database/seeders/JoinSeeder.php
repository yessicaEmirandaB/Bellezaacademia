<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumnos;
use App\Models\Maestros;
use App\Models\Duracioncursos;
use App\Models\cursos;
use App\Models\Materias;
use App\Models\Aulas;
use App\Models\Horarios;

class JoinSeeder extends Seeder
{
    public function run(): void
    {
        $alumno= Alumnos::create([
            'Apellidos' => 'alumno1',
            'Nombres' => 'alumno1',
            'CI' => 'alumno1',
            'Direccion' => 'alumno1',
            'Celular' => 'alumno1',
            'Correo' => 'alumno1@gmail.com',
            'Foto' => '',
            'user_id' => 1
        ]);
        $maestro= Maestros::create([
            'apellidos' => 'mestro1',
            'nombres' => 'mestro1',
            'ci' => 'mestro1',
            'direccion' => 'mestro1',
            'celular' => 'mestro1',
            'correo' => 'mestro1@gmail.com',
            'Foto' => '',
            'especialidad' => 'mestro1',
            'user_id' => 2
        ]);
        $duracion= Duracioncursos::create([
            'fechaInicio' => '01-04-2024',
            'fechaFin' => '01-12-2024',
        ]);
        $curso= cursos::create([
            'nombrecurso'=> 'Retoques de Piel',
            'precio'=>100,
            'duracion_curso_id'=>$duracion->id
        ]);
        $materia= Materias::create([
            'nombremateria'=> 'Retoques de Piel'
        ]);
        $aula= Aulas::create([
            'NumAula'=> 'C40',
            'Capacidad'=> '20'
        ]);
        $horario= Horarios::create([
            'HoraInicio'=> '13:00',
            'HoraFinal'=> '15:00',
            'id_aula'=> $aula->id
        ]);
    }
}
