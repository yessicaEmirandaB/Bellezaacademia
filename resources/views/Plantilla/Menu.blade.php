<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela de maquillaje</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--<link rel="stylesheet" href="{{asset('Bootstrapp/css/bootstrap.min.css')}}">
    <script src="{{asset('Bootstrapp/js/bootstrap.bundle.min.js')}}"></script>

    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">-->

    <!-- UBICACION DE CSS PARA LA PLANTILLA-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- header -->
    <section class="header">

        <a href="#" class="logo"> MAKEUP MIRANDA </a>

        <nav class="navbar">

            <div id="close-navbar" class="fas fa-times">
            </div>

            <a href="{{ route('index') }}">Inicio</a>
            <a href="{{ route('Cursos') }}">Cursos</a>
            <a href="{{ route('QuienesSomos') }}">Quienes somos</a>
            <a href="{{ route('Contacto') }}">Contacto</a>
            <a href="{{ route('login') }}">perfil</a>
           <!-- <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Register</a>-->
        </nav>

        <div id="menu-btn" class="fa-solid fa-bars"></div>

    </section>
    <!-- header -->


    @yield('content')



    <!-- footer -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3> MAKEUP MIRANDA </h3>
                <p>Academia de cursos de belleza</p>
                <div class="share">
                    <a href="https://www.facebook.com/share/GpkVrf46YhikgngS/?mibextid=qi2Omg" class="fab fa-facebook-f"></a>

                    <a href="https://www.instagram.com/makeup_miranda.y?igsh=MWx5eDNyNmhqaWE5aQ==" class="fab fa-instagram"></a>

                </div>
            </div>

            <div class="box">
                <h3>CONTACTAME</h3>
                <p>+591 67861640</p>
                <a href="#" class="link">yessicamiranda@gmail.com</a>
            </div>

            <div class="box">
                <h3>UBICACION</h3>
                <p>Santa cruz de la sierra,4to anillo<br>
                    Av.Fatima radial 16,Calle la hoguera</p>
            </div>

        </div>

        <div class="credit"> created by <span>Yessica Evelin Miranda Brito</span> | Todos los derechos reservados </div>

    </section>





    <!-- footer end-->






    <script src="js/scriptNav.js"></script>


</body>

</html>