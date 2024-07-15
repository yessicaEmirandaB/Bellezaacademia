<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Duracioncursos;

class cursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $duracion= Duracioncursos::create([
            'fechaInicio' => '01-01-2024',
            'fechaFin' => '01-10-2024',
        ]);

        $curso=['Maquillaje profesional','Auto Maquillaje','Peinados'];
        foreach($curso as $cursos){
            DB::table('cursos')->insert([
                'nombrecurso'=>$cursos,
                'precio'=>100,
                'duracion_curso_id'=>$duracion->id
            ]);
        }
    }
}
