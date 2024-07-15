<?php

namespace App\Http\Controllers;

use App\Models\PermisoController;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Permission;
use App\Models\Permiso;

class PermisoControllerController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-permisos', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-permisos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-permisos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-permisos', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $permisos = Permiso::orderBy('id', 'ASC');
        if ($search) {
            $permisos->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }
        $permisos = $permisos->paginate(15);
        return view('Permisos.index', compact('permisos'));
    }


    public function create()
    {
        return view('Permisos.create');
    }

    public function store(Request $request)
    {
        //
        $campos=[
            'name'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $permisos = request()->except('_token');
        $permisos['guard_name']='web';
        Permiso::insert($permisos);
        return redirect('Permisos')->with('mensaje','Nueva Permiso creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permiso $aulas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $permiso=Permiso::findOrFail($id);
        return view('Permisos.edit',compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $campos=[
            'name'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $permiso= Permiso::find($id);
        $permiso->name =$request->input('name');
        $permiso->save();
        return redirect('Permisos')->with('mensaje','El Aula fue modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        Permiso::destroy($id);
        return redirect('Permisos')->with('mensaje','El Permiso fue borrado correctamente');
    }
}
