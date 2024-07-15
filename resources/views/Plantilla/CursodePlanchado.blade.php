@extends('Plantilla.Menu')
@section('content')
<!-- Planchado, Cepillado y Bucles -->
<section class="materiaI" id="materiaI">
    <div class="row">
        <div class="image">
            <img src="img/Bucles.jpg" alt="">
        </div>
        <div class="content">
            <h3 class="title">Planchado, Cepillado y Bucles</h3>
            <p>Dominar las diferentes herramientas de calor que permiten estilizar y cambiar temporalmente la forma del cabello.</p>
            <p>Un estilista que realice este curso debe ser detallista, tener destreza para el manejo de distintas herramientas de calor,
                creativo y analista para estilizar favorablemente el cabello de su cliente.</p>
            <p><strong>Duración:</strong>12 clases </p>
            <p><strong>Inicio:</strong>***** </p>
            <p><strong>Horario turno mañana:</strong>09:00-11:00</p>
            <p><strong>Horario turno tarde:</strong>15:00-17:00</p>
            <p><strong>Precio:</strong>650 bs</p>

            <a href="{{ route('Cursos') }}"><button>Ver otros cursos</button></a>
            <a href="#"><button>Reservar cupo</button></a>
        </div>
    </div>
</section>
<!-- fin Planchado, Cepillado y Bucles -->
<!-- la barra de mensaje -->
<section class="mensaje" id="mensaje">

    <div class="content">
        <h3>Temario</h3>
        <h1>Detallado</h1>
    </div>
</section>
<!-- fin de la barra de mensaje -->

<!-- about us -->

<section class="about" id="about">

    <h1 class="headin">Lo que aprenderas...</h1>

    <div class="row">

        <div class="image">
            <img src="img/planchad.jpg" alt="" >
        </div>

        <div class="content">
            <h3 class="title">Contenido</h3>
            <ul >
                <li>Visagismo</li>
                <li>Análisis del cabello</li>
                <li>Grados de elevación para crear o disminuir volumen en el cabello salad</li>
                <li>Técnicas de planchado en cabello lacio</li>
                <li>Técnicas de planchado en cabello ondulado, rizado y afro</li>
                <li>Técnicas de ondas con plancha</li>
                <li>Técnicas de cepillado en cabello lacio</li>
                <li>Técnicas en cabello ondulado, rizado y afro</li>
                <li>Técnicas de ondas con cepillo</li>
                <li>Técnicas cepillado cabellos cortos</li>
            </ul>
        </div>

    </div>

</section>
<!-- fin de about us -->
@endsection