<?php

namespace App\Http\Controllers;

use App\Models\PagoCursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    {

        ;
        $validator = Validator::make($request->all(), [
            'alumnocurso_id' => 'required',
            'monto'=>'numeric|required',
            'observacion'=>'nullable'
        ]);

        if ($validator->fails()) {

            return response()->json(["errors" => $validator->errors()]);
        }

        $pagocurso= PagoCursos::create([
            'alumnocurso_id' => $request->id,
            'fecha' => date('Y-m-d H:i:s'),
            'usuario' => Auth::user()->name,
            'monto'=>$request->monto,
            'metodo_pago' => $request->metodo_pago,
            'observacion'=>$request->observacion,
        ]);
        return redirect('AlumnoCurso')->with('mensaje', 'Pago registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(PagoCursos $pagoCursos)
    {
        
    }

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
}
