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
       body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1 {
            color: brown;
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            border: 1px solid #c7c7c7;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .img-thumbnail {
            max-width: 60px;
            height: auto;
        }
        @page {
            margin: 50px 25px; /* para los Márgenes superior e inferior*/
        }
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <img src="imagenes/logo.jpg" alt="" width="50px" height="50px">
    <h1 class="text-center">REPORTE DE MAESTROS</h1> <br>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>CI</th>
                <th>Dirección</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Foto</th>
                <th>Especialidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($maestro  as $key => $maestros)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$maestros->apellidos}}</td>
                <td>{{$maestros->nombres}}</td>
                <td>{{$maestros->ci}}</td>
                <td>{{$maestros->direccion}}</td>
                <td>{{$maestros->celular}}</td>
                <td>{{$maestros->correo}}</td>
                <td>
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$maestros->Foto}}" width="100" alt="" />
                </td>
                <td>{{$maestros->especialidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>