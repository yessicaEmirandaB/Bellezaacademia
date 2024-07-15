<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;

class DetalleRegistroAlumnoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-materias', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-materias', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-materias', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-materias', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        // detalle_curso_materia - alumnocurso - detalle_registro_alumno
        $querys = Alumnos::select(
            'detalle_registro_alumnos.id',
            'alumnos.Nombres',
            'cursos.nombrecurso',
            'materias.nombremateria',
            'horarios.HoraInicio',
            'horarios.HoraFinal',
            'aulas.NumAula')
        ->join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
        ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
        ->join('detalle_registro_alumnos', 'alumnoscursos.id', '=', 'detalle_registro_alumnos.id_detalle_alumno_curso')
        ->join('detalle_curso_materias', 'detalle_registro_alumnos.id_detalle_curso_materia', '=', 'detalle_curso_materias.id')
        ->join('materias', 'materias.id', '=', 'detalle_curso_materias.id_materia')
        ->join('cursos as curso2', 'curso2.id', '=', 'detalle_curso_materias.id_curso')
        ->join('horarios', 'horarios.id', '=', 'detalle_curso_materias.id_horario')
        ->join('aulas', 'aulas.id', '=', 'horarios.id_aula')
            // ->paginate(10);
            ->get();
            // dd($query);
        return view('detalle_registro_alumno.index', compact('querys'));
    }
}
