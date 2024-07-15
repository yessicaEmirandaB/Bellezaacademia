@extends('Plantilla.Menu')
@section('content')
    <!-- about us -->

    <section class="about" id="about">

        <h1 class="headin">Alcanza el éxito en el mundo de la belleza</h1>

        <div class="row">

            <div class="image">
                <img src="img/practica.jpg" alt="">
            </div>

            <div class="content">
                <h3 class="title">¿Qué se enseña en la Academia de belleza?</h3>
                <p>En la Academia de Belleza, brindamos una formación integral
                    en estética y cuidado personal. Aprenderás técnicas avanzadas de estilismo, maquillaje,
                    cuidado de la piel, al tiempo que perfeccionarás tus habilidades
                    de comunicación y atención al cliente.</p>
                <p>Además, recibirás conocimientos sobre seguridad e higiene en el ámbito de la belleza.
                    En resumen, nuestro objetivo es prepararte para convertirte en estilista, maquilladora o
                    profesional de la belleza altamente capacitado, listo para destacar en salones
                    de belleza o para emprender tu propio negocio.</p>
            </div>

        </div>

    </section>
    <!-- Automaquillaje -->
    <section class="certificado" id="certificado">
        <div class="row">
            <div class="image">
                <img src="img/home2.png" alt="">
            </div>
            <div class="content">
                <h3 class="title">Obtén tu certificado</h3>
                <p>Al finalizar el curso, te otorgamos un certificado que avala los
                    conocimientos adquiridos, ayudándote a destacar en el mercado laboral
                    y abriéndote un mundo de posibilidades </p>
                <a href="{{ route('Cursos') }}"><button>Ver los cursos</button></a>
            </div>
        </div>
    </section>
    <!-- fin Automaquillaje -->
    <!-- styles -->

    <section class="styles" id="styles">

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="img/style-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3 class="title">MISIÓN</h3>
                    <p>BRINDAR LAS HERRAMIENTAS NECESARIAS PARA EL DESARROLLO HUMANO Y LABORAL,
                        CON UNA CALIDAD EN LA ENSEÑANZA A NIVEL PROFESIONAL, POTENCIANDO LAS
                        HABILIDADES Y VIRTUDES DE LOS ALUMNOS, FORMANDO PROFESIONALES DE LA
                        BELLEZA.
                    </p>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/style-2.jpg" alt="">
                </div>
                <div class="content">
                    <h3 class="title">VISIÓN</h3>
                    <p>CREAR UN CONCEPTO DIFERENTE EN ENSEÑANZA PROFESIONAL DE LA BELLEZA
                        Y CONSOLIDARNOS COMO UN SINONIMO DE EXCELENCIA ANTE LA SOCIEDAD.
                    </p>
                </div>
            </div>
        </div>

    </section>

    <!-- styles end-->
    <!-- about us -->

    <section class="about" id="about">
        <div class="row">

            <div class="image">
                <img src="img/practica2.jpg" alt="">
            </div>

            <div class="content">
                <h3 class="title">COMO INICIO LA ACADEMIA</h3>
                <p>La academia de belleza “Makeup Miranda” se dedica a la enseñanza
                    de maquillaje profesional, automaquillaje, maquillaje personalizado
                    y peinado para todo tipo de acontecimiento social. La academia inicio
                    sus cursos en el año 2021 y se encuentra ubicado en la ciudad de santa cruz
                    de la sierra, 4to anillo Av. Fátima radial 16.
                </p>
                <p>Los cursos son de lunes a viernes, las clases cuentan con 3 turnos con
                    los siguientes horarios: 9:00 am a 12:00 pm; 14:00 pm a 17:00 pm; 17:00 pm a 20:00 pm.</p>
            </div>

        </div>

    </section>
    <!-- FIN DE about us -->
    <!-- la barra de mensaje -->
    <section class="mensaje" id="mensaje">

        <div class="content">
            <h3>CONVIERTE TU PASIÓN<br>EN UNA PROFESIÓN ALTAMENTE</h3>
            <h1>Galeria de Imagenes</h1>

        </div>
    </section>
    <!-- fin de la barra de mensaje -->
    <!-- GALERIA-->
    <section class="about" id="about">
        <div class="contenedor">
            <div class="galeria">
                <div class="imagen">
                    <img src="img/img-insta/foto1.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/img-insta/foto2.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/img-insta/foto3.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/img-insta/foto4.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/img-insta/foto5.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/img-insta/foto6.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/img-insta/foto7.png" alt="">
                </div>
                <div class="imagen">
                    <img src="img/img-insta/foto8.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DE GALERIA -->
@endsection
