@extends('Plantilla.Menu')
@section('content')
<!-- Automaquillaje -->
<section class="materiaI" id="materiaI">
    <div class="row">
        <div class="image">
            <img src="img/imagen6.jpg" alt="">
        </div>
        <div class="content">
            <h3 class="title">Automaquillaje</h3>
            <p>Cursos de Automaquillaje en la ciudad de Santa Cruz
               Aprenderás desde 0 a maquillarte como una profesional
               6 días de clases,el precio del curso es de 350bs con todo material incluido  </p>

            <p><strong>Duración:</strong>6 clases  </p>
            <p><strong>Inicio:</strong>*********  </p>
            <p><strong>Horario turno mañana:</strong> 9:00 - 12:00  </p>
            <p><strong>Horario turno tarde:</strong> 15:00 - 18:00  </p>
            <p><strong>Precio:</strong>350bs</p>

            <a href="{{ route('Cursos') }}"><button>Ver otros cursos</button></a>
            <a href="#"><button>Reservar cupo</button></a>
        </div>
    </div>
</section>
<!-- fin Automaquillaje -->
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
            <img src="img/automa.jpg" alt="" >
        </div>

        <div class="content">
            <h3 class="title">Contenido</h3>
            <ul >
                <li>2 Técnicas de preparado de piel</li>
                <li>Como maquillar tus cejitas de 2 diferentes maneras</li>
                <li>Cómo aplicar el contorno y corrector de manera correcta para tu tipo de rostro</li>
                <li>4 Técnicas de sombreados</li>
                <li>2 Técnicas de maquillaje colorido </li>
                <li>Aplicación de pedrería y brillos HD </li>
                <li>Como aplicar las pestañas correctamente </li>
            </ul>
        </div>

    </div>

</section>
<!-- fin de about us -->
@endsection