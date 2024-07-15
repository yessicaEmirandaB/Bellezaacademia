<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela de maquillaje</title>

    <!--<link rel="stylesheet" href="{{asset('Bootstrapp/css/bootstrap.min.css')}}">
    <script src="{{asset('Bootstrapp/js/bootstrap.bundle.min.js')}}"></script>

    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">-->

    <!-- UBICACION DE CSS PARA LA PLANTILLA-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- header -->
    <header>
        <div class="back">
            <div class="menu container">
                <a href="#" class="logo"> MAKEUP MIRANDA</a>
                <input type="checkbox" id="menu">
                <label for="menu">
                    <img src="imagenes/menu.png" class="menu-icono" alt="">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="{{ route('index') }}">Inicio</a></li>
                        <li><a href="{{ route('Cursos') }}">Cursos</a></li>
                        <li><a href="{{ route('QuienesSomos') }}">Quienes somos</a></li>
                        <li><a href="{{ route('Contacto') }}">Contacto</a></li>
                        <li><a href="{{ route('Perfil') }}">perfil</a></li>
                        
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item mx-0 mx-lg-1">
                            <a href="{{ url('/home') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Home</a>
                        </li>
                        @else
                        <li class="nav-item mx-0 mx-lg-1">
                            <a href="{{ route('login') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item mx-0 mx-lg-1">
                            <a href="{{ route('register') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </nav>

            </div>
        </div>
        @yield('content')

    </header>

    <!-- header End -->


</body>

</html>