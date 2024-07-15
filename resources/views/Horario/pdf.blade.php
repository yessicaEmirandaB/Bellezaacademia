<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>REPORTE</title>
    <style>
        h1 {
            color: brown;
        }
    </style>
</head>

<body>
    <img src="imagenes/logo.jpg" alt="" width="50px" height="50px">
    <h1 class="text-center">REPORTE DE HORARIOS</h1> <br>
    <table class="table table-striped table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>#</th>
                    <th>Num. Aulas</th>
                    <th>Materias</th>
                    <th>Hora Inicio</th>
                    <th>Hora Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalles as $key => $detalle)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$detalle->aulas->NumAula}}</td>
                    <td>{{$detalle->materias->nombremateria}}</td>
                    <td>{{$detalle->HoraInicio}}</td>
                    <td>{{$detalle->HoraFinal}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>