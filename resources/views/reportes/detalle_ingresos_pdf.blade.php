<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>REPORTE</title>
    <style>
        h4 {
            text-align: center;
            color: brown;
            border-bottom: 1px solid #000;

        }

        .estilo-contenedor {
            width: 100%;
            margin: 0 auto;
            font-family: 'Verdana, Geneva, Tahoma, sans-serif';
            font-size: 12px;
        }

        .estilos-tabla {
            width: 100%;
            border-collapse: collapse;
        }

        .estilos-thead {
            background-color: #f2f2f2;
        }

        .estilos-thead th {
            border: 1px solid #000;
            padding: 1px;
            text-align: center;
        }

        .estilos-tabla td {
            border: 1px solid #000;
            padding: 1px;
            text-align: center;
        }


    </style>

</head>

<body>
    <div class="estilo-contenedor">
        <div class="row">
            <div class="header">
                <img src="imagenes/logo.jpg" alt="" width="50px" height="50px">
            </div>
        </div>
        <div class="row">
            <h4 class="text-center" style="color: brown; font-family: 'Verdana, Geneva, Tahoma, sans-serif'">
                INFORME GENERAL DE INGRESOS</h4>
        </div>
        <div class="row">
            @if ($filtros->fecha_inicio ?? (' ' != ' ' && $filtros->fecha_fin ?? ' ' != ' '))
                <div class="col-md-3">
                    <strong>Fecha Inicio:</strong> {{ $filtros->fecha_inicio ?? ' ' }}
                </div>
                <div class="col-md-3">
                    <strong>Fecha Fin:</strong>
                    {{ $filtros->fecha_fin ?? ' ' }}
                </div>
            @endif
            <div class="col-md-3">
                <strong>Curso:</strong> {{ $filtros->curso ?? 'Todos' }}
            </div>
            <div class="col-md-3 mb-1">
                <strong>Método
                    de Pago:</strong> {{ $filtros->metodo_pago ?? 'Todos' }}
            </div>
        </div>

        <table class="estilos-tabla">
            <thead class="estilos-thead">
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

        <strong>Generado Por:</strong> {{ Auth::user()->name }} <br>
        <strong>En Fecha:</strong> {{ date('d-m-Y H:i:s') }}
    </div>
</body>

</html>
