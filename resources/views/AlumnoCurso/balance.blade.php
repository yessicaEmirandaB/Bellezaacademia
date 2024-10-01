<!doctype html>
<html lang="en">

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
    </style>
</head>

<body>
    <img src="imagenes/logo.jpg" alt="" width="50px" height="50px">
    <div class="row text-center">
        <span class="text-center" style="font-size: 30px; font-weight: bold; color: brown;">
            EXTRACTO DE PAGOS</span> <br>
        <span><strong>ESTUDIANTE: </strong>({{ $balances[0]->Nombres }} {{ $balances[0]->Apellidos }})</span> <br>
        <span><strong>CURSO:</strong> {{ $balances[0]->nombrecurso }}</span>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <span><strong>COSTO DEL CURSO:</strong> {{ $balances[0]->costo }}</span>
        </div>
        <div class="col-md-4">
            <span><strong>A CUENTA:</strong> {{ $balances[0]->a_cuenta }}</span>
        </div>
        <div class="col-md-4">
            <span><strong>SALDO:</strong> {{ $balances[0]->costo - $balances[0]->a_cuenta }}</span>
        </div>
    </div>
    <table class="table table-striped table-bordered mt-2">
        <thead class="table-warning">
            <tr>
                <th>#</th>
                <th>Fecha de Pago</th>
                <th>Monto</th>
                <th>Método Pago</th>
                <th>Observaciones</th>
                <th>Cobrado por</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($balances as $key => $balance)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td> {{ $balance->fecha }} </td>
                    <td class="text-end"> {{ $balance->monto }} </td>
                    <td> {{ $balance->metodo_pago }} </td>
                    <td> {{ $balance->observacion }} </td>
                    <td> {{ $balance->usuario }} </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="text-right"><strong>Total a Cuenta:</strong></td>
                <td class="text-end"><strong>{{ $balances[0]->a_cuenta }}</strong></td>
                <td colspan="3"></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
