<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
         return view('Plantilla.index');

    }
    public function cursos()
    {
         return view('Plantilla.Cursos');

    }
    public function quienessomos()
    {
         return view('Plantilla.QuienesSomos');

    }
    public function contacto()
    {
         return view('Plantilla.Contacto');

    }
    
    public function perfil()
    {
         return view('Plantilla.Perfil');

    }
    //CONTROLADOR DE MAS INFORMACION DE LOS CURSOS
    public function maquillajeprofesional()
    {
         return view('Plantilla.CursodeMaquillajeProfesional');

    }
    public function automaquillaje()
    {
         return view('Plantilla.CursodeAutomaquillaje');

    }
    public function peinados()
    {
         return view('Plantilla.CursodePeinados');

    }
    public function planchado()
    {
         return view('Plantilla.CursodePlanchado');

    }
    


}
