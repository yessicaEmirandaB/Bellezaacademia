<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use App\Models\Materias;
use App\Models\Horarios;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HorariosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-horarios', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-horarios', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-horarios', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-horarios', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $detalles = Horarios::join('aulas', 'aulas.id', '=', 'horarios.id_aula')
        ->where('aulas.NumAula', 'like', '%' . $search . '%')
        ->select(
            'aulas.*',
            'horarios.*'
        )->paginate(3); // Pagina los resultados

        return view('Horario.index', compact('detalles'));
    }
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $detalles = Horarios::with('aulas', 'materias')
        ->when($search, function ($query, $search) {
            return $query->whereHas('materias', function ($query) use ($search) {
                    $query->where('nombremateria', 'like', '%' . $search . '%');
                })
                ->orWhereHas('aulas', function ($query) use ($search) {
                    $query->where('NumAula', 'like', '%' . $search . '%');
                });
            })
            ->get();

        $pdf = Pdf::loadView('Horario.pdf', compact('detalles'));
        return $pdf->stream();
        // return $pdf->download('alumnos_cursos.pdf'); // Para descargar directamente
    }

    public function create()
    {
        //
        $aulas = Aulas::all();
        $materias = Materias::all();
        return view('Horario.create', compact('aulas', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Aulas_id' => 'nullable|exists:aulas,id',
            'HoraInicio' => 'required|string|max:20',
            'HoraFinal' => 'required|string|max:20',
        ]);
        $datosMateria = request()->except('_token');
        Horarios::insert($datosMateria);
        //return response()->json($datosAlumno);
        return redirect('Horario')->with('mensaje', 'Nueva materia creada con exito');
    }
    public function show(Horarios $horarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $detalle = Horarios::findOrFail($id);
        $aulas = Aulas::all();
        return view('Horario.edit', compact('detalle', 'aulas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'Aulas_id' => 'nullable|exists:aulas,id',
            'Materias_id' => 'nullable|exists:materias,id',
            'HoraInicio' => 'required|string|max:20',
            'HoraFinal' => 'required|string|max:20',
        ]);

        $datosMateria = $request->except(['_token', '_method']);
        Horarios::where('id', '=', $id)->update($datosMateria);

        return redirect('Horario')->with('mensaje', 'Horario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Horarios::destroy($id);
        return redirect('Horario')->with('mensaje', 'Horario eliminado con éxito');
    }
}
