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
            border: 1px solid #ddcb66;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .img-thumbnail {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <img src="imagenes/logo.jpg" alt="" width="50px" height="50px">
    <h1 class="text-center">REPORTE DE ALUMNOS </h1> <br>
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
                
            </tr>
        </thead>
        <tbody>
            @foreach($alumno  as $key =>$alumnos)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$alumnos->Apellidos}}</td>
                <td>{{$alumnos->Nombres}}</td>
                <td>{{$alumnos->CI}}</td>
                <td>{{$alumnos->Direccion}}</td>
                <td>{{$alumnos->Celular}}</td>
                <td>{{$alumnos->Correo}}</td>
                <td>
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$alumnos->Foto}}" width="100" alt="" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>