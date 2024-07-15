@extends('Plantilla.Menu')
@section('content')
<section class="about" id="about">

    <h1 class="headin">Bienvenido al Perfil<br>Elige tu tipo de cuenta</h1>



</section>
<!-- la barra de iconos -->
<section class="icon" id="icon">

    <!--<div class="wrapper">
        <ul>
            <li class="Maestro"><a href="{{ route('login') }}"><i class="fa-solid fa-chalkboard-user"></i></a></li>
            <li class="Alumno"><a href="{{ route('login') }}"><i class="fa-solid fa-user-graduate"></i></a></li>
            <li class="Administrativo"><a href="{{ route('login') }}"><i class="fa-solid fa-user-tie"></i></a></li>
        </ul>

    </div>-->
    <div class="containericon">
        <div class="wrappers">
            <div class="icon Maestro">
                <div class="tooltip">
                    Maestro
                </div>
                <span><a href="{{ route('login') }}"><i class="fa-solid fa-chalkboard-user"></i></a></span>
            </div>
            <div class="icon Alumno">
                <div class="tooltip">
                    Alumno
                </div>
                <span><a href="{{ route('login') }}"><i class="fa-solid fa-user-graduate"></i></a></span>
            </div>
            <div class="icon Administracion">
                <div class="tooltip">
                    Administracion
                </div>
                <span><a href="{{ route('login') }}"><i class="fa-solid fa-user-tie"></i></a></span>
            </div>
        </div>
    </div>
</section>

<!-- fin de la barra de iconos -->
@endsection