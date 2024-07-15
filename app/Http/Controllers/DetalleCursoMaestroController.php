<?php

namespace App\Http\Controllers;

use App\Models\Maestros;
use App\Models\cursos;
use App\Models\Detalle_Curso_Maestro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DetalleCursoMaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $detalles = Maestros::join('detalle_curso_maestros', 'maestros.id', '=', 'detalle_curso_maestros.Maestros_id')
            ->join('cursos', 'cursos.id', '=', 'detalle_curso_maestros.cursos_id')
            ->select('maestros.*', 'cursos.*', 'detalle_curso_maestros.*')
            ->when($search, function ($query, $search) {
                return $query->where('maestros.nombres', 'like', '%' . $search . '%')
                    ->orWhere('maestros.apellidos', 'like', '%' . $search . '%')
                    ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%');
            })
            ->paginate(3); // Pagina los resultados

        return view('MaestroCurso.index', compact('detalles'));

       /* $detalles = Detalle_Curso_Maestro::with('maestros','cursos')->get();
        // dd($detalles);
         return view('MaestroCurso.index', compact('detalles'));*/



    }
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $detalles = Maestros::join('detalle__curso__maestros', 'maestros.id', '=', 'detalle__curso__maestros.Maestros_id')
            ->join('cursos', 'cursos.id', '=', 'detalle__curso__maestros.cursos_id')
            ->select('maestros.*', 'cursos.*', 'detalle__curso__maestros.*')
            ->when($search, function ($query, $search) {
                return $query->where('maestros.nombres', 'like', '%' . $search . '%')
                    ->orWhere('maestros.apellidos', 'like', '%' . $search . '%')
                    ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%');
            })
            ->get();

        $pdf = Pdf::loadView('MaestroCurso.pdf', compact('detalles'));
        return $pdf->stream();
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $maestros=Maestros::all();
        $cursos=cursos::all();
        return view('MaestroCurso.create',compact('maestros','cursos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Maestros_id' => 'nullable|exists:maestros,id',
            'cursos_id' => 'nullable|exists:cursos,id',

        ]);

        $datosDetalle = request()->except('_token');
        Detalle_Curso_Maestro::insert($datosDetalle);

        return redirect('MaestroCurso')->with('mensaje','creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Detalle_Curso_Maestro $detalle_Curso_Maestro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $detalle = Detalle_Curso_Maestro::findOrFail($id);
        $maestros = Maestros::all();
        $cursos = cursos::all();
        return view('MaestroCurso.edit', compact('detalle', 'maestros', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
           'Maestros_id' => 'nullable|exists:maestros,id',
            'cursos_id' => 'nullable|exists:cursos,id',
        ]);

        $datosDetalle = $request->except(['_token', '_method']);
        Detalle_Curso_Maestro::where('id', '=', $id)->update($datosDetalle);

        return redirect('MaestroCurso')->with('mensaje', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Detalle_Curso_Maestro::destroy($id);
        return redirect('MaestroCurso')->with('mensaje', 'Eliminado con éxito');
    }
}
