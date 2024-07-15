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

            <a href="{{ route('CursodeMaquillajeProfesional') }}"><button>Más información</button></a>
        </div>
    </div>
</section>
<!-- fin Maquillaje Profesional-->

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
               6 días de clases con todo material incluido  </p>

            <p><strong>Duración:</strong>6 clases  </p>
            <p><strong>Inicio:</strong>*********  </p>
            <p><strong>Horario turno mañana:</strong> 9:00 - 12:00  </p>
            <p><strong>Horario turno tarde:</strong> 15:00 - 18:00  </p>

            <a href="{{ route('CursodeAutomaquillaje') }}"><button>Más información</button></a>
        </div>
    </div>
</section>
<!-- fin Automaquillaje -->
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

            <a href="{{ route('CursodePeinados') }}"><button>Más información</button></a>
        </div>
    </div>
</section>
<!-- fin Peinados -->

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

            <a href="{{ route('CursodePlanchado') }}"><button>Más información</button></a>
        </div>
    </div>
</section>
<!-- fin Planchado, Cepillado y Bucles -->
@endsection