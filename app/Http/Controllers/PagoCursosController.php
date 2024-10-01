<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\PagoCursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class PagoCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {;
        $validator = Validator::make($request->all(), [
            'alumnocurso_id' => 'required',
            'monto' => 'numeric|required',
            'observacion' => 'nullable'
        ]);

        if ($validator->fails()) {

            return response()->json(["errors" => $validator->errors()]);
        }

        $pagocurso = PagoCursos::create([
            'alumnocurso_id' => $request->id,
            'fecha' => date('Y-m-d H:i:s'),
            'usuario' => Auth::user()->name,
            'monto' => $request->monto,
            'metodo_pago' => $request->metodo_pago,
            'observacion' => $request->observacion,
        ]);
        return redirect('AlumnoCurso')->with('mensaje', 'Pago registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(PagoCursos $pagoCursos) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PagoCursos $pagoCursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PagoCursos $pagoCursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PagoCursos $pagoCursos)
    {
        //
    }

    public function detalle_ingreso()
    {
        $cursos = DB::table('cursos')->select('id', 'nombrecurso')->get() ?? [];

        return view('reportes.detalle_ingresos', compact('cursos'));
    }

    public function filtro_ingresos(Request $request)
    {
        $cursos = DB::table('cursos')->select('id', 'nombrecurso')->get() ?? [];
        $fecha_inicio = date('Y-m-d 00:00:00', strtotime($request->fecha_inicio));
        $fecha_fin = date('Y-m-d 23:59:59', strtotime($request->fecha_fin));

        $pago_cursos = DB::table('pago_cursos')
            ->select('pago_cursos.*', 'cursos.nombrecurso', 'alumnos.nombres', 'alumnos.apellidos')
            ->join('cursos', 'pago_cursos.curso_id', '=', 'cursos.id')
            ->join('alumnos', 'pago_cursos.alumno_id', '=', 'alumnos.id');


        if ($request->curso_id != 0) {
            $pago_cursos = $pago_cursos->where('pago_cursos.curso_id', $request->curso_id);
        }

        if ($request->fecha_inicio != null) {
            $pago_cursos = $pago_cursos->where('pago_cursos.fecha', '>=', $fecha_inicio);
        }

        if ($request->fecha_fin != null) {
            $pago_cursos = $pago_cursos->where('pago_cursos.fecha', '<=', $fecha_fin);
        }

        if ($request->metodo_pago != 0) {
            $pago_cursos = $pago_cursos->where('pago_cursos.metodo_pago', $request->metodo_pago);
        }

        $pago_cursos = $pago_cursos->get();

        return view('reportes.detalle_ingresos', compact('pago_cursos', 'cursos'));
    }

    public function detalle_ingreso_pdf(Request $request)
    {
        $cursos = DB::table('cursos')->select('id', 'nombrecurso')->get() ?? [];
        $filtros = new stdClass();

        $fecha_inicio = date('Y-m-d 00:00:00', strtotime($request->fecha_inicio));
        $fecha_fin = date('Y-m-d 23:59:59', strtotime($request->fecha_fin));

        $pago_cursos = DB::table('pago_cursos')
            ->select('pago_cursos.*', 'cursos.nombrecurso', 'alumnos.nombres', 'alumnos.apellidos')
            ->join('cursos', 'pago_cursos.curso_id', '=', 'cursos.id')
            ->join('alumnos', 'pago_cursos.alumno_id', '=', 'alumnos.id');


        if ($request->curso_id != 0) {
            $pago_cursos = $pago_cursos->where('pago_cursos.curso_id', $request->curso_id);
            $filtros->curso = cursos::find($request->curso_id)->nombrecurso ?? '';
        }

        if ($request->fecha_inicio != null) {
            $pago_cursos = $pago_cursos->where('pago_cursos.fecha', '>=', $fecha_inicio);
            $filtros->fecha_inicio = date('d-m-Y', strtotime($request->fecha_inicio));
        }

        if ($request->fecha_fin != null) {
            $pago_cursos = $pago_cursos->where('pago_cursos.fecha', '<=', $fecha_fin);
            $filtros->fecha_fin = date('d-m-Y', strtotime($request->fecha_fin));
        }

        if ($request->metodo_pago != 0) {
            $pago_cursos = $pago_cursos->where('pago_cursos.metodo_pago', $request->metodo_pago);
            $filtros->metodo_pago = $request->metodo_pago == 1 ? 'Efectivo' : 'Transferencia';
        }

        $pago_cursos = $pago_cursos->get();

        $pdf = \PDF::loadView('reportes.detalle_ingresos_pdf', compact('pago_cursos', 'cursos', 'filtros'));

        return $pdf->download('detalle_ingresos.pdf');
    }
}
