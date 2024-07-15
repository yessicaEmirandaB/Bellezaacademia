<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-aulas', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-aulas', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-aulas', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-aulas', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $aula = Aulas::orderBy('id', 'ASC');
        if ($search) {
            $aula->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('NumAula', 'like', '%' . $search . '%')
                    ->orWhere('Capacidad', 'like', '%' . $search . '%');
            });
        }
        $aula = $aula->get();
        return view('Aula.index', compact('aula'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Aula.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'NumAula'=>'required|string|max:100',
            'Capacidad'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosAula = request()->except('_token');
        Aulas::insert($datosAula);
        //return response()->json($datosAlumno);
        return redirect('Aula')->with('mensaje','Nueva Aula creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aulas $aulas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $aulas=Aulas::findOrFail($id);

        return view('Aula.edit',compact('aulas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $campos=[
            'NumAula'=>'required|string|max:100',
            'Capacidad'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $aulas= Aulas::find($id);
        $aulas->NumAula =$request->input('NumAula');
        $aulas->Capacidad =$request->input('Capacidad');
        $aulas->save();
        return redirect('Aula')->with('mensaje','El Aula fue modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Aulas::destroy($id);

        return redirect('Aula')->with('mensaje','El Aula fue borrado correctamente');
    }
}
