<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Makeup Miranda</title>
   <!-- <link rel="stylesheet" href="Bootstrapp/css/bootstrapp.min.css">  ESTE ES EL LLAMADO DE LA CARPETA DE BOOTSTRAP -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <!--<link rel="stylesheet" type="text/css" href="css/sidebar.css">-->
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
    <div id="app" class="wrapper">
        @guest
         <!-- NO APARECE LA BARRA LATERAL -->
         @else
        @include('layouts.sidebar')
        @endguest
       
        <div id="content">
            @include('layouts.sidehead')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!--<script src="Bootstrapp/js/bootstrapp.min.js"></script>-->
</body>

</html>