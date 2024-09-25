<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Maestros;
use App\Models\DetalleRegistroMaestro;
use App\Models\Materias;

use Illuminate\Http\Request;

class DetalleRegistroMaestroController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-materias', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-materias', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-materias', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-materias', ['only' => ['destroy']]);
    }

    public function index(){
        $querys = Maestros::select('maestros.nombres', 'cursos.nombrecurso', 'materias.nombremateria',
                    DB::raw("CONCAT(horarios.HoraInicio, ' - ', horarios.HoraFinal) AS horarioss"), 'aulas.NumAula', 'detalle_registro_maestros.id as id_detalle_registro_maestros')
                ->join('detalle_curso_maestros', 'maestros.id', '=', 'detalle_curso_maestros.maestros_id')
                ->join('cursos', 'cursos.id', '=', 'detalle_curso_maestros.cursos_id')
                ->join('detalle_registro_maestros', 'detalle_curso_maestros.id', '=', 'detalle_registro_maestros.id_detalle_curso_maestro')
                ->join('detalle_curso_materias', 'detalle_registro_maestros.id_detalle_curso_materia', '=', 'detalle_curso_materias.id')
                ->join('materias', 'materias.id', '=', 'detalle_curso_materias.id_materia')
                ->join('cursos as curso2', 'curso2.id', '=', 'detalle_curso_materias.id_curso')
                ->join('horarios', 'horarios.id', '=', 'detalle_curso_materias.id_horario')
                ->join('aulas', 'aulas.id', '=', 'horarios.id_aula')
                ->get();
        return view('detalle_registro_maestro.index', compact('querys'));
    }

    public function create(){
        $cb_curso_maestros = $this->getCbCursoMaestros();
        $cb_curso_materias = $this->getCbCursoMaterias();
                //dd($cb_curso_maestros,$cb_curso_materias);
        return view('detalle_registro_maestro.create',compact('cb_curso_maestros','cb_curso_materias'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $campos = [
            'id_detalle_curso_maestro' => 'required|exists:detalle_curso_maestros,id',
            'id_detalle_curso_materia' => 'required|exists:detalle_curso_materias,id'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'exists' => 'El :attribute no existe',
        ];

        // Verificar si la combinación ya existe
        $exists = DetalleRegistroMaestro::where('id_detalle_curso_maestro', $request->id_detalle_curso_maestro)
            ->where('id_detalle_curso_materia', $request->id_detalle_curso_materia)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withErrors(['combination' => 'El registro que inteta crear ya existe. Revise los datos!']);
        }
        $validatedData = $request->validate($campos, $mensaje);

        $datos = $request->except('_token');
        DetalleRegistroMaestro::create($datos);
        return redirect('detalle_registro_maestro')->with('mensaje', 'Datos creados con éxito');
    }
    public function show(string $id){
    }

    public function edit(string $id){
        $cb_curso_maestros = $this->getCbCursoMaestros();
        $cb_curso_materias = $this->getCbCursoMaterias();
        $registro = DetalleRegistroMaestro::findOrFail($id);
        return view('detalle_registro_maestro.edit', compact('cb_curso_maestros','cb_curso_materias','registro'));
    }

    public function update(Request $request, $id){
        $campos = [
            'id_detalle_curso_maestro' => 'required|exists:detalle_curso_maestros,id',
            'id_detalle_curso_materia' => 'required|exists:detalle_curso_materias,id',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'exists' => 'El :attribute no existe en la base de datos'
        ];

        // Verificar si la combinación ya existe
        $exists = DetalleRegistroMaestro::where('id_detalle_curso_maestro', $request->id_detalle_curso_maestro)
            ->where('id_detalle_curso_materia', $request->id_detalle_curso_materia)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withErrors(['combination' => 'Este registro ya existe, verifique los datos!.']);
        }
        $validatedData = $request->validate($campos, $mensaje);

        $datos = $request->except(['_token', '_method']);
        DetalleRegistroMaestro::where('id', '=', $id)->update($datos);
        return redirect('detalle_registro_maestro')->with('mensaje', 'Datos actualizados con éxito');
    }

    public function destroy(string $id){
        DetalleRegistroMaestro::find($id)->delete();
        return redirect('detalle_registro_maestro')->with('mensaje', 'Borrado correctamente');
    }

    public function getCbCursoMaestros(){
        $data =  Maestros::join('detalle_curso_maestros', 'maestros.id', '=', 'detalle_curso_maestros.Maestros_id')
                ->join('cursos', 'cursos.id', '=', 'detalle_curso_maestros.cursos_id')
                ->select(
                        DB::raw("CONCAT(maestros.nombres, ' ', maestros.apellidos, ' / ' , cursos.nombrecurso) AS cursomaestro"),
                        'detalle_curso_maestros.id as id_detalle_curso_maestros')
                ->get();
        return $data;
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
}
