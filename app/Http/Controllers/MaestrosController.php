<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\Maestros;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class MaestrosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-maestros', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-maestros', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-maestros', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-maestros', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda
        $maestro = Maestros::orderBy('id', 'ASC');
        $user = Auth::user();
        // Aplicar búsqueda si se proporciona un término de búsqueda
        if ($search) {
            $maestro->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('apellidos', 'like', '%' . $search . '%')
                    ->orWhere('nombres', 'like', '%' . $search . '%')
                    ->orWhere('ci', 'like', '%' . $search . '%')
                    ->orWhere('direccion', 'like', '%' . $search . '%')
                    ->orWhere('celular', 'like', '%' . $search . '%')
                    ->orWhere('correo', 'like', '%' . $search . '%')
                    ->orWhere('especialidad', 'like', '%' . $search . '%');
            });
        }
        if (!$user->hasRole('super-admin')) {
            $maestro = $maestro->join('roles', 'maestros.role_id', '=', 'roles.id')
                ->select('maestros.*', 'roles.name as role_name');
        } else {
            $maestro = $maestro->get(); // Obtener todos los registros que coinciden con la búsqueda
        }
        return view('Maestro.index', compact('maestro'));
    }
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda
        $maestro = Maestros::orderBy('id', 'ASC');
        // Aplicar búsqueda si se proporciona un término de búsqueda
        if ($search) {
            $maestro->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('apellidos', 'like', '%' . $search . '%')
                    ->orWhere('nombres', 'like', '%' . $search . '%')
                    ->orWhere('ci', 'like', '%' . $search . '%')
                    ->orWhere('direccion', 'like', '%' . $search . '%')
                    ->orWhere('celular', 'like', '%' . $search . '%')
                    ->orWhere('correo', 'like', '%' . $search . '%')
                    ->orWhere('especialidad', 'like', '%' . $search . '%');
            });
        }
        $maestro = $maestro->get();
        $pdf = PDF::loadView('Maestro.pdf', compact('maestro'));
        // Devolver el PDF para ser mostrado en el navegador
        return $pdf->stream('Maestro.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('Maestro.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'apellidos' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
            'nombres' => 'required||max:100|regex:/^[a-zA-Z ]+$/u',
            'ci' => 'required|numeric|digits_between:1,20|unique:maestros',
            'direccion' => 'required|string|max:100',
            'celular' => 'required|numeric|digits:8',
            'correo' => 'required|email',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
            'especialidad' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
        ];
        $mensaje = [
            'unique' => 'El :attribute ya existe verifique.',
            'required' => 'El :attributo es requerido',
            'Foto.required' => 'La foto requerida',
            'digits' => 'El campo :attribute debe contener exactamente :digits caracteres.',
            'regex' => 'El campo :attribute debe contener solamente letras',
            'numeric' => 'El campo :attribute debe contener solamente números',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosMaestro = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $datosMaestro['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        Maestros::insert($datosMaestro);
        //return response()->json($datosAlumno);
        return redirect('Maestro')->with('mensaje', 'Maestro agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maestros $maestro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $maestros = Maestros::findOrFail($id);
        $users = User::all();
        return view('Maestro.edit', compact('users', 'maestros'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'apellidos' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
            'nombres' => 'required||max:100|regex:/^[a-zA-Z ]+$/u',
            'ci' => 'required|numeric|digits_between:1,20|unique:maestros,ci,' . $id,
            'direccion' => 'required|string|max:100',
            'celular' => 'required|numeric|digits:8',
            'correo' => 'required|email',
            'especialidad' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
        ];
        $mensaje = [
            'unique' => 'El :attribute ya existe verifique.',
            'required' => 'El :attributo es requerido',
            'digits' => 'El campo :attribute debe contener exactamente :digits caracteres.',
            'regex' => 'El campo :attribute debe contener solamente letras',
            'numeric' => 'El campo :attribute debe contener solamente números',
        ];

        if ($request->hasFile('Foto')) {
            $campos = ['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje = ['Foto.required' => 'La foto requerida'];
        }
        $this->validate($request, $campos, $mensaje);
        //
        $datosMaestro = request()->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            $maestros = Maestros::findOrFail($id);
            Storage::delete('public/' . $maestros->Foto);
            $datosMaestro['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Maestros::where('id', '=', $id)->update($datosMaestro);

        $maestros = Maestros::findOrFail($id);
        // return view('Alumno.edit',compact('alumnos'));
        return redirect('Maestro')->with('mensaje', 'El maestro fue modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $maestros = Maestros::findOrFail($id);
        if (Storage::delete('public/' . $maestros->Foto)) {

            Maestros::destroy($id);
        }

        return redirect('Maestro')->with('mensaje', 'El maestro fue borrado correctamente');
    }
}
