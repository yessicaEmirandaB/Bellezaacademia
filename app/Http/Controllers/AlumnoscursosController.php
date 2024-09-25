<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\cursos;

use App\Models\Alumnoscursos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumnoscursosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-alumnoscursos', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-alumnoscursos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-alumnoscursos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-alumnoscursos', ['only' => ['destroy']]);
    }
    public function index(Request $request)
{
    $search = $request->input('search'); // Obtén el valor del campo de búsqueda
    $estado = $request->input('estado'); // Obtén el valor del filtro de estado

    $detalles = Alumnos::join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
        ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
        ->select('alumnos.*', 'cursos.nombrecurso', 'alumnoscursos.Calificacion', 'alumnoscursos.Estado')
        ->when($search, function ($query, $search) {
            return $query->where('alumnos.Nombres', 'like', '%' . $search . '%')
                ->orWhere('alumnos.Apellidos', 'like', '%' . $search . '%')
                ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%')
                ->orWhere('alumnoscursos.Calificacion', 'like', '%' . $search . '%')
                ->orWhere('Estado', 'like', '%' . $search . '%');
                
        })
        ->when($estado, function ($query, $estado) {
            return $query->where('alumnoscursos.Estado', $estado);
        })
        ->paginate(10); // Pagina los resultados

    return view('AlumnoCurso.index', compact('detalles'));
}
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $detalles = Alumnos::join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
            ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
            ->select('alumnos.*', 'cursos.*', 'alumnoscursos.*')
            ->when($search, function ($query, $search) {
                return $query->where('alumnos.Nombres', 'like', '%' . $search . '%')
                    ->orWhere('alumnos.Apellidos', 'like', '%' . $search . '%')
                    ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%')
                    ->orWhere('Calificacion', 'like', '%' . $search . '%')
                    ->orWhere('Estado', 'like', '%' . $search . '%');
            })
            ->get();

        $pdf = Pdf::loadView('AlumnoCurso.pdf', compact('detalles'));
        return $pdf->stream();
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }
    public function pdfcali(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $detalles = Alumnos::join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
            ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
            ->select('alumnos.*', 'cursos.*', 'alumnoscursos.*')
            ->when($search, function ($query, $search) {
                return $query->where('alumnos.Nombres', 'like', '%' . $search . '%')
                    ->orWhere('alumnos.Apellidos', 'like', '%' . $search . '%')
                    ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%')
                    ->orWhere('Calificacion', 'like', '%' . $search . '%')
                    ->orWhere('Estado', 'like', '%' . $search . '%');
            })
            ->get();

        $pdf = Pdf::loadView('AlumnoCurso.pdfcali', compact('detalles'));
        return $pdf->stream();
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumnos::all();
        $cursos = cursos::all();
        return view('AlumnoCurso.create', compact('alumnos', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Alumnos_id' => 'nullable|exists:alumnos,id',
            'cursos_id' => 'nullable|exists:cursos,id',
            'Calificacion' => 'nullable|string|max:100',

        ]);

        $datosDetalle = $request->except('_token');
        if (!isset($datosDetalle['Calificacion']) || empty($datosDetalle['Calificacion'])) {
            $datosDetalle['Calificacion'] = ''; // Valor por defecto
        }
    
        $calificacion = intval($datosDetalle['Calificacion']);
        $datosDetalle['Estado'] = $calificacion > 51 ? 'Aprobado' : 'Reprobado';
        Alumnoscursos::insert($datosDetalle);

        return redirect('AlumnoCurso')->with('mensaje', 'creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumnoscursos $alumnoscursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detalle = Alumnoscursos::findOrFail($id);
        $alumnos = Alumnos::all();
        $cursos = cursos::all();
        return view('AlumnoCurso.edit', compact('detalle', 'alumnos', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'Alumnos_id' => 'nullable|exists:alumnos,id',
            'cursos_id' => 'nullable|exists:cursos,id',
            'Calificacion' => 'nullable|string|max:100',
            'Estado' => 'string|max:100',

        ]);

        $datosDetalle = $request->except(['_token', '_method']);
        Alumnoscursos::where('id', '=', $id)->update($datosDetalle);

        return redirect('AlumnoCurso')->with('mensaje', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Alumnoscursos::destroy($id);
        return redirect('AlumnoCurso')->with('mensaje', 'Eliminado con éxito');
    }
}
