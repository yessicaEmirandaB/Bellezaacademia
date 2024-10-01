<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\DetalleCursoMateriaController;
use App\Http\Controllers\DetalleRegistroMaestroController;
use App\Http\Controllers\AlumnoscursosController as ControllersAlumnoscursosController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DetalleRegistroAlumnoController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\DetalleCursoMaestroController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\DuracioncursosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BienvenidosController;

//Agregamos los controladores para roles y permisos
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagoCursosController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoControllerController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Plantilla.Menu');
});
Route::get('Alumno/pdf', [AlumnosController::class, 'pdf'])->name('Alumno.pdf');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('Permisos', PermisoControllerController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('Alumno', AlumnosController::class);
    Route::resource('curso_materia', DetalleCursoMateriaController::class);
    Route::resource('detalle_registro_alumno', DetalleRegistroAlumnoController::class);
    Route::resource('detalle_registro_maestro', DetalleRegistroMaestroController::class);
});

/////fin PARA ROLES Y PERMISOS

Route::get('/Alumno/create', [AlumnosController::class, 'create']);
Auth::routes();

Route::get('/home', [BienvenidosController::class, 'index'])->name('home');


/** ALumno detalle */
Route::get('/alumno_detalle_registro', [AlumnosController::class, 'detailIAulumnoRegisterndex'])->name('alumno_detalle_registro.index');
/** End  - ALumno detalle */
Route::resource('/BIENVENIDO', BienvenidosController::class)->middleware('auth');
Auth::routes(['reset' => false]);

Route::resource('/Alumno', AlumnosController::class);
// Route::get('/materia_curso', [DetalleCursoMateriaController::class, 'index'])->name('materia_curso.index');


Route::get('AlumnoCurso/pdf', [ControllersAlumnoscursosController::class, 'pdf'])->name('AlumnoCurso.pdf');
Route::get('AlumnoCurso/pdfcali', [ControllersAlumnoscursosController::class, 'pdfcali'])->name('AlumnoCurso.pdfcali');
Route::resource('/AlumnoCurso', ControllersAlumnoscursosController::class);
Route::post('AlumnoCurso/pagar', [ControllersAlumnoscursosController::class, 'pagar_curso'])->name('AlumnoCurso.pagar');

Route::post('AlumnoCurso/balance', [ControllersAlumnoscursosController::class, 'balance'])->name('AlumnoCurso.balance');
Route::get('MaestroCurso/pdf', [DetalleCursoMaestroController::class, 'pdf'])->name('MaestroCurso.pdf');
Route::resource('/MaestroCurso', DetalleCursoMaestroController::class);
Route::get('Maestro/pdf', [MaestrosController::class, 'pdf'])->name('Maestro.pdf');
Route::resource('/Maestro', MaestrosController::class);
Route::get('Curso/pdf', [CursosController::class, 'pdf'])->name('Curso.pdf');
Route::resource('/Curso', CursosController::class);
Route::get('Materia/pdf', [MateriasController::class, 'pdf'])->name('Materia.pdf');
Route::resource('/Materia', MateriasController::class);
Route::get('Horario/pdf', [HorariosController::class, 'pdf'])->name('Horario.pdf');
Route::resource('/Horario', HorariosController::class);
Route::resource('/Aula', AulasController::class);
Route::get('DuracionCurso/pdf', [DuracioncursosController::class, 'pdf'])->name('DuracionCurso.pdf');
Route::resource('/DuracionCurso', DuracioncursosController::class);
Route::resource('/BIENVENIDO', BienvenidosController::class);


//RUTAS DEl FRONT-END
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/Cursos', [IndexController::class, 'cursos'])->name('Cursos');
Route::get('/QuienesSomos', [IndexController::class, 'quienessomos'])->name('QuienesSomos');
Route::get('/Contacto', [IndexController::class, 'contacto'])->name('Contacto');
Route::get('/Perfil', [IndexController::class, 'perfil'])->name('Perfil');

//RUTAS DE MAS INFORMACION DE LOS CURSOS
Route::get('/CursodeMaquillajeProfesional', [IndexController::class, 'MaquillajeProfesional'])->name('CursodeMaquillajeProfesional');
Route::get('/CursodeAutomaquillaje', [IndexController::class, 'Automaquillaje'])->name('CursodeAutomaquillaje');
Route::get('/CursodePeinados', [IndexController::class, 'Peinados'])->name('CursodePeinados');
Route::get('/CursodePlanchado', [IndexController::class, 'Planchado'])->name('CursodePlanchado');
//FIN DE RUTAS DE MAS INFORMACION DE LOS CURSOS

//REPORTES
Route::get('reportes.detalle_ingresos', [PagoCursosController::class, 'detalle_ingreso'])->name('reportes.detalle_ingresos');
Route::post('reportes.detalle_ingresos', [PagoCursosController::class, 'detalle_ingreso'])->name('reportes.detalle_ingresos');

Route::get('reportes.filtro_ingresos', [PagoCursosController::class, 'filtro_ingresos'])->name('filtro_ingresos');
Route::post('reportes.filtro_ingresos', [PagoCursosController::class, 'filtro_ingresos'])->name('filtro_ingresos');
