<?php

namespace App\Http\Controllers;
use App\Models\cursos;
use App\Models\Materias;
use App\Models\Horarios;
use App\Models\DetalleCursoMateria;
use App\Rules\UniqueCursoMateriaHorario;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class DetalleCursoMateriaController extends Controller
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
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $curso_materias = Materias::join('detalle_curso_materias', 'materias.id', '=', 'detalle_curso_materias.id_materia')
            ->join('cursos', 'cursos.id', '=', 'detalle_curso_materias.id_curso')
            ->join('horarios', 'horarios.id', '=', 'detalle_curso_materias.id_horario')
            ->join('aulas', 'aulas.id', '=', 'horarios.id_aula')
            ->where('materias.nombremateria', 'like', '%' . $search . '%')
            ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%')
            ->select('cursos.*', 'materias.*', 'detalle_curso_materias.*', 'horarios.*', 'aulas.*', 'detalle_curso_materias.id as id_detalle_curso_materias')
            ->paginate(10);
        return view('curso_materia.index', compact('curso_materias'));
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
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }

    public function create()
    {
        return view('curso_materia.create', [
            'cursos' => cursos::all(),
            'materias' => Materias::all(),
            'horarios' => Horarios::all(),
        ]);
    }

    public function store(Request $request)
    {
        $campos = [
            'id_curso' => 'required|exists:cursos,id',
            'id_materia' => 'required|exists:materias,id',
            'id_horario' => 'required|exists:horarios,id',
        ];

        $mensaje = [
            'id_curso.required' => 'El curso es requerido',
            'id_curso.exists' => 'El curso no existe',
            'id_materia.required' => 'La materia es requerida',
            'id_materia.exists' => 'La materia no existe',
            'id_horario.required' => 'El horario es requerido',
            'id_horario.exists' => 'El horario no existe',
        ];

        // Verificar si la combinación ya existe
        $exists = DetalleCursoMateria::where('id_curso', $request->id_curso)
            ->where('id_materia', $request->id_materia)
            ->where('id_horario', $request->id_horario)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withErrors(['combination' => 'El registro ya existe, verifique los datos!.']);
        }
        $validatedData = $request->validate($campos, $mensaje);

        $datos = $request->except('_token');
        DetalleCursoMateria::create($datos);
        return redirect('curso_materia')->with('mensaje', 'Datos creados con éxito');
    }

    public function show(Materias $materias)
    {
        //
    }
    public function edit($id)
    {
        $curso_materia = DetalleCursoMateria::findOrFail($id);
        // dd($curso_materia->id);
        return view('curso_materia.edit', ['horarios' => Horarios::all(),'materias' => Materias::all(), 'cursos' => cursos::all(), 'curso_materia' => $curso_materia]);
    }

    public function update(Request $request, $id)
    {
        $campos = [
            'id_curso' => 'required',
            'id_materia' => 'required',
            'id_horario' => 'required',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        // Verificar si la combinación ya existe
        $exists = DetalleCursoMateria::where('id_curso', $request->id_curso)
            ->where('id_materia', $request->id_materia)
            ->where('id_horario ', $request->id_horario )
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withErrors(['combination' => 'Este registro ya existe, verifique los datos!.']);
        }
        $validatedData = $request->validate($campos, $mensaje);

        $datos = $request->except(['_token', '_method']);
        DetalleCursoMateria::where('id', '=', $id)->update($datos);
        return redirect('detalle_registro_maestro')->with('mensaje', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        DetalleCursoMateria::destroy($id);

        return redirect('curso_materia')->with('mensaje', 'Borrado correctamente');
    }
}
