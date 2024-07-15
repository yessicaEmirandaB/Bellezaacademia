<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\cursos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MateriasController extends Controller
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

        $materia = Materias::with('cursos')
            ->when($search, function ($query, $search) {
                return $query->where('nombremateria', 'like', '%' . $search . '%');
                    // ->orWhereHas('cursos', function ($query) use ($search) {
                    //     $query->where('nombrecurso', 'like', '%' . $search . '%');
                    // });
            })
            ->paginate(10); // Pagina los resultados

        return view('Materia.index', compact('materia'));
    }

    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $materia = Materias::with('cursos')
            ->when($search, function ($query, $search) {
                return $query->where('nombremateria', 'like', '%' . $search . '%')
                    ->orWhereHas('cursos', function ($query) use ($search) {
                        $query->where('nombrecurso', 'like', '%' . $search . '%');
                    });
            })
            ->get();

        $pdf = Pdf::loadView('Materia.pdf', compact('materia'));
        return $pdf->stream();
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Materia.create', ['cursos' => cursos::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            // 'cursos_id' => 'required|string|max:100',
            'nombremateria' => 'required|string|max:100',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosMateria = request()->except('_token');
        Materias::insert($datosMateria);
        //return response()->json($datosAlumno);
        return redirect('Materia')->with('mensaje', 'Nueva materia creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materias $materias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $materias = Materias::findOrFail($id);

        return view('Materia.edit', ['materias' => $materias, 'cursos' => cursos::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'cursos_id' => 'required',
            'nombremateria' => 'required|string|max:100',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $materias = Materias::find($id);
        $materias->cursos_id = $request->input('cursos_id');
        $materias->nombremateria = $request->input('nombremateria');
        $materias->save();
        return redirect('Materia')->with('mensaje', 'La materia fue modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Materias::destroy($id);

        return redirect('Materia')->with('mensaje', 'El curso fue borrado correctamente');
    }
}
