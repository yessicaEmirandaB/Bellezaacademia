@extends('Plantilla.Menu')
@section('content')

<!-- home -->

<section class="home" id="home">

    <div class="content">
        <h3>Escuela de Maquillaje <br> PROFESIONAL <br> </h3>
        <span>Transforma tu pasión en profesión</span>
    </div>
</section>
<!-- home -->
<!-- about us -->

<section class="about" id="about">

    <h1 class="headin">Hola soy,Yessenia Miranda Brito</h1>

    <div class="row">

        <div class="image">
            <img src="img/imagen2.jpg" alt="">
        </div>

        <div class="content">
            <h3 class="title">Maquilladora profesional</h3>
            <p>Fundadora y directora de la Escuela de cursos de belleza Profesional 
                "Makeup Miranda".Diariamente trabajo y estudio las nuevas técnicas de maquillaje para poder ofrecer
                lamás amplia variedad a los alumnos que confían en mi escuela.</p>

            <p>Nuestras enseñanzas van desde las más sencillas a las más complejas,
                pasando por estrategias de marketing para poder atraer clientes para tu negocio.
            </p>
            <p>Vivo con la ilusión de compartir todo el conocimiento aprendido mis 5 años de carrera.
                Mi objetivo es que todo el alumnado de MM consiga ver que esta profesion es mucho más que
                solo estetico y quiero enseñarte como poder vivir de ella.</p>

            <div class="icons-container">
                <div class="icons">
                    <h3>Aprenderas<br>Ultimas tendencias</h3>
                </div>
                <div class="icons">
                    <h3>Recibiras<br>Certificado de participación</h3>
                </div>
                <div class="icons">
                    <h3>Obtendras<br>Exito laboral</h3>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- la barra de mensaje -->
<section class="mensaje" id="mensaje">

    <div class="content">
        <h3>CONVIERTE TU PASIÓN<br>EN UNA PROFESIÓN ALTAMENTE</h3>
        <h1>Rentable</h1>

    </div>
</section>
<!-- fin de la barra de mensaje -->

<!-- services -->

<section class="services" id="services">

    <h1 class="heading">¿Qué te gustaría aprender?</h1>

    <div class="box-container">

        <div class="box">
            <img src="img/maquiprofesi.jpg" alt="">
            <div class="content">
                <h3>Maquillaje profesional</h3>
            </div>
        </div>

        <div class="box">
            <img src="img/automaquillaje.jpg" alt="">
            <div class="content">
                <h3>Automaquillaje </h3>
            </div>
        </div>

        <div class="box">
            <img src="img/peinados.jpg" alt="">
            <div class="content">
                <h3>Peinados</h3>
            </div>
        </div>

        <div class="box">
            <img src="img/Bucles2.jpg" alt="">
            <div class="content">
                <h3>Planchado,cepillado y Bucles</h3>
            </div>
        </div>

    </div>

</section>

<!-- services end -->
@endsection