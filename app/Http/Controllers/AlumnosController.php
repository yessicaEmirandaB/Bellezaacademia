<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumnosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-alumnos', ['only' => ['index', 'show']]);
        $this->middleware('permission:crear-alumnos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-alumnos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-alumnos', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda

        $alumno = Alumnos::orderBy('id', 'ASC');
        // Aplicar búsqueda si se proporciona un término de búsqueda
        if ($search) {
            $alumno->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('Apellidos', 'like', '%' . $search . '%')
                    ->orWhere('Nombres', 'like', '%' . $search . '%')
                    ->orWhere('CI', 'like', '%' . $search . '%')
                    ->orWhere('Direccion', 'like', '%' . $search . '%')
                    ->orWhere('Celular', 'like', '%' . $search . '%')
                    ->orWhere('Correo', 'like', '%' . $search . '%');
            });
        }
        $alumno = $alumno->get(); // Obtener todos los registros que coinciden con la búsqueda
        return view('Alumno.index', compact('alumno'));
    }
    public function pdf(Request $request)
    {
        $search = $request->input('search'); // Obtén el valor del campo de búsqueda
        $alumno = Alumnos::orderBy('id', 'ASC');
        // Aplicar búsqueda si se proporciona un término de búsqueda
        if ($search) {
            $alumno->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('Apellidos', 'like', '%' . $search . '%')
                    ->orWhere('Nombres', 'like', '%' . $search . '%')
                    ->orWhere('CI', 'like', '%' . $search . '%')
                    ->orWhere('Direccion', 'like', '%' . $search . '%')
                    ->orWhere('Celular', 'like', '%' . $search . '%')
                    ->orWhere('Correo', 'like', '%' . $search . '%');
            });
        }
        $alumno = $alumno->get(); // Obtener todos los registros que coinciden con la búsqueda
        $pdf = PDF::loadView('Alumno.pdf', compact('alumno'));
        // Devolver el PDF para ser mostrado en el navegador
        return $pdf->stream('alumnos.pdf');
    }
    public function create()
    {
        $users = User::all();
        return view('Alumno.create', compact('users'));
    }
    public function store(Request $request)
    {
        //
        $campos = [
            'Apellidos' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
            'Nombres' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
            'CI' => 'required|numeric|digits_between:1,20|unique:alumnos', // Verifica la unicidad
            'Direccion' => 'required|string|max:50',
            'Celular' => 'required|numeric|digits:8',
            'Correo' => 'required|email',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'unique' => 'El :attribute ya existe verifique.',
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto requerida',
            'digits' => 'El campo :attribute debe contener exactamente :digits caracteres.',
            'regex' => 'El campo :attribute debe contener solamente letras',
            'numeric' => 'El campo :attribute debe contener solamente números',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosAlumno = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        Alumnos::insert($datosAlumno);
        //return response()->json($datosAlumno);
        return redirect('Alumno')->with('mensaje', 'Alumno agregado con exito');
    }
    public function show($id)
    {
        //
        // $alumno = Alumnos::findOrFail($id);
        //return view('Alumno.show', ['alumno' => $alumno]);
    }
    public function edit($id)
    {
        //
        $alumnos = Alumnos::findOrFail($id);
        $users = User::all();
        return view('Alumno.edit', compact('users', 'alumnos'));
    }
    public function update(Request $request, $id)
    {
        $campos = [
            'Apellidos' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
            'Nombres' => 'required|max:100|regex:/^[a-zA-Z ]+$/u',
            'CI' => 'required|numeric|digits_between:1,20|unique:alumnos,CI,' . $id,
            'Direccion' => 'required|string|max:50',
            'Celular' => 'required|numeric|digits:8',
            'Correo' => 'required|email',
        ];
        $mensaje = [
            'unique' => 'El :attribute ya existe verifique.',
            'required' => 'El :attribute es requerido',
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
        $datosAlumno = request()->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            $alumnos = Alumnos::findOrFail($id);
            Storage::delete('public/' . $alumnos->Foto);
            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Alumnos::where('id', '=', $id)->update($datosAlumno);

        $alumnos = Alumnos::findOrFail($id);
        // return view('Alumno.edit',compact('alumnos'));
        return redirect('Alumno')->with('mensaje', 'El alumno fue modificado');
    }
    public function destroy($id)
    {
        //
        $alumnos = Alumnos::findOrFail($id);
        if (Storage::delete('public/' . $alumnos->Foto)) {

            Alumnos::destroy($id);
        }

        return redirect('Alumno')->with('mensaje', 'El alumno borrado correctamente');
    }
    public function prueba()
    {
        $role = Role::where('name', '=', 'supervisor')->first();
        $permissions = Permission::where('name', 'like', '%alumnos%')->get();
        dd($role);
    }
    public function detailIAulumnoRegisterndex()
    {
        // alumno curso materia horario
    }
}
