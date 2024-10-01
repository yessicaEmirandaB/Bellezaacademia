<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\cursos;

use App\Models\Alumnoscursos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\PagoCursos;
use DB;

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

        $detalles = DB::table('alumnoscursos')
            ->join('alumnos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
            ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
            ->select('alumnoscursos.id', 'alumnos.Nombres', 'alumnos.Apellidos', 'cursos.nombrecurso', 'cursos.precio', 'alumnoscursos.Alumnos_id', 'alumnoscursos.cursos_id', 'alumnoscursos.costo', 'alumnoscursos.Calificacion', 'alumnoscursos.Estado')
            ->when($search, function ($query, $search) {
                return $query->where('alumnos.Nombres', 'like', '%' . $search . '%')
                    ->orWhere('alumnos.Apellidos', 'like', '%' . $search . '%')
                    ->orWhere('cursos.nombrecurso', 'like', '%' . $search . '%')
                    ->orWhere('alumnoscursos.Calificacion', 'like', '%' . $search . '%');
            })
            ->when($estado, function ($query, $estado) {
                return $query->where('alumnoscursos.Estado', $estado);
            })
            ->paginate(10); // Pagina los resultados

        //sumo de pago_cursos por alumnocurso_id    de la tabla pagocursos 
        $detalles->map(function ($detalle) {
            $detalle->a_cuenta = PagoCursos::where('alumnocurso_id', $detalle->id)->sum('monto');
            return $detalle;
        });
        // dd($detalles);
        return view('AlumnoCurso.index', compact('detalles'));
    }
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $detalles = Alumnos::join('alumnoscursos', 'alumnos.id', '=', 'alumnoscursos.Alumnos_id')
            ->join('cursos', 'cursos.id', '=', 'alumnoscursos.cursos_id')
            ->select('alumnos.', 'cursos.', 'alumnoscursos.*')
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
            ->select('alumnos.', 'cursos.', 'alumnoscursos.*')
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
        $datosDetalle['costo'] = cursos::find($request->cursos_id)->precio;
        Alumnoscursos::insert($datosDetalle);

        return redirect('AlumnoCurso')->with('mensaje', 'Asignado con exito');
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

    public function pagar_curso(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'monto' => 'required|numeric|min:1',
            'observacion' => 'nullable|min:3',
        ]);

        if ($validator->fails()) {

            return response()->json(["errors" => $validator->errors()]);
        }
        //  dd($request->all());
        $pagocurso = PagoCursos::create([
            'alumnocurso_id' => $request->alumnocurso_id,
            'fecha' => date('Y-m-d H:i:s'),
            'usuario' => Auth::user()->name,
            'monto' => $request->monto,
            'metodo_pago' => $request->metodo_pago,
            'observacion' => $request->observacion ?? '',
        ]);
        return redirect('AlumnoCurso')->with('mensaje', 'Pago registrado con éxito');
    }
}
