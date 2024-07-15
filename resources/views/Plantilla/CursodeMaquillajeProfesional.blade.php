@extends('Plantilla.Menu')
@section('content')
<!--Maquillaje Profesional -->
<section class="materiaD" id="materiaD">
    <div class="row">
        <div class="image">
            <img src="img/maquipro.jpg" alt="">
        </div>
        <div class="content">
            <h3 class="title">Maquillaje Profesional</h3>
            <p>¿QUIERES CONVERTIRTE EN UNA MAQUILLADORA PROFESIONAL?
                Entonces estos cursos son para ti
            <p>curso de nivel Inicial-Intermedio -Avanzado de lunes a viernes</p>
            <p>Solo en la ciudad de Santa Cruz</p>
            <p>Deseas convertirte en la mejor maquilladora estos cursos son especialmente para ti.</p>

            <p><strong>Duración:</strong>1 Mes</p>
            <p><strong>Inicio:</strong>******** </p>
            <p><strong>Horario turno mañana:</strong> 9:00- 12:00</p>
            <p><strong>Horario turno tarde:</strong> 14:00 - 17:00</p>
            <p><strong>Precio</strong> 350 bs</p>

            <a href="{{ route('Cursos') }}"><button>Ver otros cursos</button></a>
            <a href="#"><button>Reservar cupo</button></a>
        </div>
    </div>
</section>
<!-- fin Maquillaje Profesional-->

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
            <img src="img/imagen7.jpg" alt="">
        </div>
        <div class="content">
            <h3 class="title">Contenido</h3>
            <ul >
                <li>2 técnicas de Preprado de piel </li>
                <li>como maquillar tus cejitas de 2 diferentes maneras </li>
                <li>cómo aplicar el contorno y corrector de manera correcta para tu tipo de rostro </li>
                <li>4 técnicas de sombreados</li>
                <li>2 técnicas de maquillaje colorido</li>
                <li>Aplicación de pedrería y brillos HD</li>
                <li>Como aplicar las pestañas correctamente </li>
            </ul>
        </div>
    </div>

</section>
<!-- fin de about us -->
@endsection