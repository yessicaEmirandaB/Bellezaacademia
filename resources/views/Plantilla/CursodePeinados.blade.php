@extends('Plantilla.Menu')
@section('content')
<!-- Peinados -->
<section class="materiaD" id="materiaD">
    <div class="row">
        <div class="image">
            <img src="img/peinados2.jpg" alt="">
        </div>
        <div class="content">
            <h3 class="title">Peinados</h3>
            <p>Diseña los mejores peinados de tendencia y actualizados con nuestro Curso de Peinado Profesional.</p>
            <p>Dominaras los conceptos del visagismo facial, corporal , para realizar peinados en relación al rostro de cada persona,
               también podrás asesorar un estilo de peinado según la vestimenta.</p>
            <p>Aprenderás estrategias para Realizar peinados en corto tiempo, técnicas que te faciliten el trabajo, peinados únicos y
               técnicas de última tendencia y mucho más ¡Profesionalízate en esta área desde ahora! </p>
            <p><strong>Duración:</strong> 2 Meses </p>
            <p><strong>Inicio:</strong>******* </p>
            <p><strong>Horario turno mañana:</strong> 9:00 - 12:00  </p>
            <p><strong>Horario turno tarde:</strong> 15:00 - 18:00  </p>
            <p><strong>Precio:</strong>1200 bs</p>

            <a href="{{ route('Cursos') }}"><button>Ver otros cursos</button></a>
            <a href="#"><button>Reservar cupo</button></a>
        </div>
</section>
<!-- fin Peinados -->
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
            <img src="img/peinados3.jpg" alt="">
        </div>

        <div class="content">
            <h3 class="title">Contenido</h3>
            <ul>
                <li>𝘝𝘪𝘴𝘢𝘨𝘪𝘴𝘮𝘰</li>
                <li>𝘈𝘯𝘢́𝘭𝘪𝘴𝘪𝘴 del cabello</li>
                <li>Tecnicas de cepillado y estilizado de cabello</li>
                <li>Tecnicas de peinado casual y social</li>
                <li>Técnicas de peinados de gala</li>
                <li>Técnicas de peinados para quinceañera y novia</li>
                <li>Técnicas de peinado para pasarela</li>
                <li>Técnicas de aplicacion de accesorio(tiara,peineta,orquilla)</li>
                <li>Peinados semirecogidos</li>
                <li>Peinados coletas bajas</li>
                <li>Peinados coletas altos</li>
                <li>Diseños descontraidos y lisos apto para todo evento social</li>
                <li>Uso correcto de herramientas y productos</li>

            </ul>
        </div>
    </div>

</section>
<!-- fin de about us -->
@endsection