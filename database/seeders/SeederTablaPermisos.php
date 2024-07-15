<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    public function run(): void
    {
        $permisos = [

            // permisos para modulos
            'ver-mod-inscripcion',
            'ver-mod-parametro',
            'ver-mod-admistracion',
            'ver-mod-pago',
            'ver-mod-reporte',
            'ver-mod-home',

            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla permisos
            'ver-permisos',
            'crear-permisos',
            'editar-permisos',
            'borrar-permisos',
            //tabla alumnos
            'ver-alumnos',
            'crear-alumnos',
            'editar-alumnos',
            'borrar-alumnos',
            //tabla maestros
            'ver-maestros',
            'crear-maestros',
            'editar-maestros',
            'borrar-maestros',
            //tabla cursos
            'ver-cursos',
            'crear-cursos',
            'editar-cursos',
            'borrar-cursos',
            //tabla materias
            'ver-materias',
            'crear-materias',
            'editar-materias',
            'borrar-materias',
            //tabla aulas
            'ver-aulas',
            'crear-aulas',
            'editar-aulas',
            'borrar-aulas',
            //tabla horarios
            'ver-horarios',
            'crear-horarios',
            'editar-horarios',
            'borrar-horarios',
            //tabla detalle__curso__maestros
            'ver-detalle__curso_maestros',
            'crear-detalle_curso_maestros',
            'editar-detalle_curso_maestros',
            'borrar-detalle_curso_maestros',
             //tabla duracioncursos
             'ver-duracioncursos',
             'crear-duracioncursos',
             'editar-duracioncursos',
             'borrar-duracioncursos',
             //tabla alumnoscursos
             'ver-alumnoscursos',
             'crear-alumnoscursos',
             'editar-alumnoscursos',
             'borrar-alumnoscursos',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
