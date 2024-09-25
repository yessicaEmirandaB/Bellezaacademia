<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Materias;
use App\Models\DetalleRegistroAlumno;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $materia = Materias::with('cursos')
            ->when($search, function ($query, $search) {
                return $query->where('nombremateria', 'like', '%' . $search . '%')->orWhereHas('cursos', function ($query) use ($search) {
                    $query->where('nombrecurso', 'like', '%' . $search . '%');
                });
            })
            ->get();

        $pdf = Pdf::loadView('Materia.pdf', compact('materia'));
        return $pdf->stream();
    }
    public function create()
    {
        $cbcursomaterias = $this->getCbCursoMaterias();
        $cbalumnocursoduracions = $this->getCbAlumnoCursoDuracion();
        return view('detalle_registro_alumno.create', compact('cbcursomaterias','cbalumnocursoduracions'));
    }
    public function store(Request $request){
        $campos = [
            'id_detalle_alumno_curso' => 'required|exists:alumnoscursos,id',
            'id_detalle_curso_materia' => 'required|exists:detalle_curso_materias,id',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'exists' => 'El :attribute no existe',
        ];

        // Verificar si la combinación ya existe
        $exists = DetalleRegistroAlumno::where('id_detalle_alumno_curso', $request->id_detalle_alumno_curso)
            ->where('id_detalle_curso_materia', $request->id_detalle_curso_materia)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withErrors(['combination' => 'El registro ya existe.']);
        }
        $validatedData = $request->validate($campos, $mensaje);
        $datos = $request->except('_token');
        DetalleRegistroAlumno::create($datos);
        return redirect('detalle_registro_alumno')->with('mensaje', 'Datos creados con éxito');
    }
    public function show(Materias $materias){
    }
    public function edit($id)
    {
        $data = DetalleRegistroAlumno::findOrFail($id);
        return view('detalle_registro_alumno.edit', [
            'cbcursomaterias' => $this->getCbCursoMaterias(),
            'cbalumnocursoduracions' => $this->getCbAlumnoCursoDuracion(),
            'query' => $data]
        );
    }

    public function update(Request $request, $id){
        $campos = [
            'id_detalle_alumno_curso' => 'required|exists:alumnoscursos,id',
            'id_detalle_curso_materia' => 'required|exists:detalle_curso_materias,id',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'exists' => 'El :attribute no existe'
        ];

        // Verificar si la combinación ya existe
        $exists = DetalleRegistroAlumno::where('id_detalle_alumno_curso', $request->id_detalle_alumno_curso)
            ->where('id_detalle_curso_materia', $request->id_detalle_curso_materia)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withErrors(['combination' => 'El registro ya existe.']);
        }
        $validatedData = $request->validate($campos, $mensaje);

        $datos = $request->except(['_token', '_method']);
        DetalleRegistroAlumno::where('id', '=', $id)->update($datos);
        return redirect('detalle_registro_alumno')->with('mensaje', 'Datos actualizados con éxito');
    }
    public function destroy($id){
        DetalleRegistroAlumno::destroy($id);
        return redirect('detalle_registro_alumno')->with('mensaje', 'Borrado correctamente');
    }

    public function getCbCursoMaterias(){
        $data =  Materias::join('detalle_curso_materias', 'materias.id', '=', 'detalle_curso_materias.id_materia')
                ->join('cursos', 'cursos.id', '=', 'detalle_curso_materias.id_curso')
                ->join('horarios', 'horarios.id', '=', 'detalle_curso_materias.id_horario')
                ->join('aulas', 'aulas.id', '=', 'horarios.id_aula')
                ->select(
                    DB::raw("CONCAT(cursos.nombrecurso, ' / ' , materias.nombremateria, ' - ', horarios.HoraInicio, ' a ', horarios.HoraFinal, '(', aulas.NumAula, ')' ) AS cursomateriahorarioaula"),
                    'detalle_curso_materias.id as id_detalle_curso_materias'
                )
                ->get();
        return $data;
    }
    public function getCbAlumnoCursoDuracion(){
        $data =  Alumnos::join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
                ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
                ->join('duracioncursos', 'duracioncursos.id', '=', 'cursos.duracion_curso_id')
                ->select(
                    DB::raw("CONCAT(alumnos.Nombres, ' ',alumnos.Apellidos  , ' / ' , cursos.nombrecurso, ' - ', 'Desde: ', duracioncursos.fechaInicio, ' hasta: ', duracioncursos.fechaFin) AS alumnocursoduracion"),
                    'alumnoscursos.id as id_alumnoscursos'
                )
                ->get();
        return $data;
    }
}
