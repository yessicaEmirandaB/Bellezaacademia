<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AlumnoscursosController as ControllersAlumnoscursosController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\DetalleCursoMaestroController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\DuracioncursosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BienvenidosController;

//Agregamos los controladores para roles y permisos
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoControllerController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;

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
Auth::routes();
Route::get('/home', [BienvenidosController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    //Alumno
    Route::get('alumnos' , [AlumnosController::class, 'index'])->name('alumnos.index')
    ->middleware(middleware:'permission:alumnos.index');

    Route::get('alumnos/ver' , [AlumnosController::class, 'index'])->name('alumnos.ver')
    ->middleware(middleware:'permission:index.ver');

    Route::get('alumnos/editar' , [AlumnosController::class, 'index'])->name('alumnos.editar')
    ->middleware(middleware:'permission:alumnos.editar');

    Route::get('alumnos/borrar' , [AlumnosController::class, 'index'])->name('alumnos.borrar')
    ->middleware(middleware:'permission:alumnos.borrar');

    Route::get('alumnos/crear' , [AlumnosController::class, 'index'])->name('alumnos.crear')
    ->middleware(middleware:'permission:alumnos.crear');

    //Maestros
    Route::get('alumnos' , [AlumnosController::class, 'index'])->name('alumnos.index')
    ->middleware(middleware:'permission:alumnos.index');

    Route::get('alumnos/ver' , [AlumnosController::class, 'index'])->name('alumnos.ver')
    ->middleware(middleware:'permission:index.ver');

    Route::get('alumnos/editar' , [AlumnosController::class, 'index'])->name('alumnos.editar')
    ->middleware(middleware:'permission:alumnos.editar');

    Route::get('alumnos/borrar' , [AlumnosController::class, 'index'])->name('alumnos.borrar')
    ->middleware(middleware:'permission:alumnos.borrar');

    Route::get('alumnos/crear' , [AlumnosController::class, 'index'])->name('alumnos.crear')
    ->middleware(middleware:'permission:alumnos.crear');


});

Route::get('/', function () {
return view('Plantilla.Menu');
});
/*
Route::get('Alumno/pdf',[AlumnosController::class, 'pdf'] )->name('Alumno.pdf');
Route::group(['middleware'=> ['auth']],function(){
    Route::resource('roles',RolController::class);
    Route::resource('permisos',PermisoControllerController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('Alumno', AlumnosController::class);
});

/////fin PARA ROLES Y PERMISOS

// Route::get('/Alumno/create',[AlumnosController::class,'create']);
Auth::routes();

Route::get('/home', [BienvenidosController::class, 'index'])->name('home');

Route::resource('/BIENVENIDO', BienvenidosController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

// Route::resource('/Alumno', AlumnosController::class);
// Route::get('AlumnoCurso/pdf',[ControllersAlumnoscursosController::class, 'pdf'] )->name('AlumnoCurso.pdf');
// Route::resource('/AlumnoCurso', ControllersAlumnoscursosController::class);
Route::get('MaestroCurso/pdf',[DetalleCursoMaestroController::class, 'pdf'] )->name('MaestroCurso.pdf');
Route::resource('/MaestroCurso', DetalleCursoMaestroController::class);
Route::get('Maestro/pdf',[MaestrosController::class, 'pdf'] )->name('Maestro.pdf');
Route::resource('/Maestro', MaestrosController::class);
Route::get('Curso/pdf',[CursosController::class, 'pdf'] )->name('Curso.pdf');
Route::resource('/Curso', CursosController::class);
Route::get('Materia/pdf',[MateriasController::class, 'pdf'] )->name('Materia.pdf');
Route::resource('/Materia', MateriasController::class);
Route::get('Horario/pdf',[HorariosController::class, 'pdf'] )->name('Horario.pdf');
Route::resource('/Horario', HorariosController::class);
Route::resource('/Aula', AulasController::class);
Route::get('DuracionCurso/pdf',[DuracioncursosController::class, 'pdf'] )->name('DuracionCurso.pdf');
Route::resource('/DuracionCurso', DuracioncursosController::class);
Route::resource('/BIENVENIDO', BienvenidosController::class);


//RUTAS DEl FRONT-END
Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/Cursos',[IndexController::class,'cursos'])->name('Cursos');
Route::get('/QuienesSomos',[IndexController::class,'quienessomos'])->name('QuienesSomos');
Route::get('/Contacto',[IndexController::class,'contacto'])->name('Contacto');
Route::get('/Perfil',[IndexController::class,'perfil'])->name('Perfil');

//RUTAS DE MAS INFORMACION DE LOS CURSOS
Route::get('/CursodeMaquillajeProfesional',[IndexController::class,'MaquillajeProfesional'])->name('CursodeMaquillajeProfesional');
Route::get('/CursodeAutomaquillaje',[IndexController::class,'Automaquillaje'])->name('CursodeAutomaquillaje');
Route::get('/CursodePeinados',[IndexController::class,'Peinados'])->name('CursodePeinados');
Route::get('/CursodePlanchado',[IndexController::class,'Planchado'])->name('CursodePlanchado');
//FIN DE RUTAS DE MAS INFORMACION DE LOS CURSOS
*/





