<?php

namespace App\Http\Controllers;

use App\Models\Duracioncursos;
use App\Models\cursos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DuracioncursosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-alumnos', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-alumnos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-alumnos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-alumnos', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $Duracioncurso = Duracioncursos::with('cursos')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('fechaInicio', 'like', '%' . $search . '%')
                          ->orWhere('fechaFin', 'like', '%' . $search . '%');
                })
                // ->orWhereHas('cursos', function ($query) use ($search) {
                //     $query->where('nombrecurso', 'like', '%' . $search . '%');
                // })
                ;
            })
            ->paginate(3);
        return view('DuracionCurso.index', compact('Duracioncurso'));
    }
    public function pdf(Request $request)
    {
        $search = $request->input('search');

        $Duracioncurso = Duracioncursos::with('cursos')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('fechaInicio', 'like', '%' . $search . '%')
                          ->orWhere('fechaFin', 'like', '%' . $search . '%');
                })->orWhereHas('cursos', function ($query) use ($search) {
                    $query->where('nombrecurso', 'like', '%' . $search . '%');
                });
            })
            ->get();

        $pdf = Pdf::loadView('DuracionCurso.pdf', compact('Duracioncurso'));
        return $pdf->stream();
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }

    public function create()
    {
        return view('DuracionCurso.create', ['cursos' => cursos::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'cursos_id' => 'required|string|max:100',
            'fechaInicio' => 'required|string|max:100',
            'fechaFin' => 'required|string|max:100',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosMateria = request()->except('_token');
        Duracioncursos::insert($datosMateria);
        //return response()->json($datosAlumno);
        return redirect('DuracionCurso')->with('mensaje', 'Nueva materia creada con exito');
    }


    /**
     * Display the specified resource.
     */
    public function show(Duracioncursos $duracioncursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Duracioncursos = Duracioncursos::findOrFail($id);

        return view('DuracionCurso.edit', ['Duracioncursos' => $Duracioncursos, 'cursos' => cursos::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'cursos_id' => 'required',
            'fechaInicio' => 'required|string|max:100',
            'fechaFin' => 'required|string|max:100',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $Duracioncursos = Duracioncursos::find($id);
        $Duracioncursos->cursos_id = $request->input('cursos_id');
        $Duracioncursos->fechaInicio = $request->input('fechaInicio');
        $Duracioncursos->fechaFin = $request->input('fechaFin');
        $Duracioncursos->save();
        return redirect('DuracionCurso')->with('mensaje', 'La materia fue modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Duracioncursos::destroy($id);
        return redirect('DuracionCurso')->with('mensaje', 'Fue eliminado correctamente');
    }
}
