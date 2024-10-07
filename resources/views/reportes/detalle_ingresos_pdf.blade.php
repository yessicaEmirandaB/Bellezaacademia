<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>REPORTE</title>
    <style>
        h1 {
            color: brown;
        }

        .row {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="row">
        <img src="imagenes/logo.jpg" alt="" width="50px" height="50px">
    </div>
    <div class="row">
        <h1 class="text-center" style="color: brown;">INFORME GENERAL DE INGRESOS</h1>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>Fecha Inicio:</strong> {{ $filtros->fecha_inicio ?? ' ' }} - <strong>Fecha Fin:</strong>
            {{ $filtros->fecha_fin ?? ' ' }} - <strong>Curso:</strong> {{ $filtros->curso ?? 'Todos' }} - <strong>Método
                de Pago:</strong> {{ $filtros->metodo_pago ?? 'Todos' }}
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered" style="font-size: 12px;">
            <thead class="table-warning">
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Cursos</th>
                    <th>Estudiante</th>
                    <th>Monto</th>
                    <th>Método Pago</th>
                    <th>Cobrado por</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($pago_cursos as $key => $pagocurso)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pagocurso->fecha }}</td>
                        <td>{{ $pagocurso->nombrecurso }}</td>
                        <td>{{ $pagocurso->nombres }} {{ $pagocurso->apellidos }}</td>
                        <td>{{ $pagocurso->monto }}</td>
                        <td>{{ $pagocurso->metodo_pago }}</td>
                        <td>{{ $pagocurso->usuario }}</td>
                    </tr>

                    @php $total += $pagocurso->monto; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total Cobrado:</strong></td>
                    <td><strong>{{ $total }}</strong></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
