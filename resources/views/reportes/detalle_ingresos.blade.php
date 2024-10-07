@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="col-md-12 text-center">
            <h2> <i class="fa fa-file"></i>
                Informe General de Ingresos</h2>
        </div>
        @include('reportes.filtros_detalle_ingresos')
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped mt-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Curso</th>
                                <th>Estudiante</th>
                                <th>Monto</th>
                                <th>Método de Pago</th>
                                <th>Cobrado por</th>
                            </tr>
                        </thead>
                        @isset($pago_cursos)
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
                                    <td colspan="4" class="text-end"><strong>Total Cobrado:</strong></td>
                                    <td><strong>{{ $total }}</strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        @endisset
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
