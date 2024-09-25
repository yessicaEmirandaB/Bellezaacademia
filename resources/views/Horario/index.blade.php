@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-header d-inline-flex">
            <a href="{{ url('Horario/create') }}" class="btn btn-success">Crear</a>
            &nbsp;
            <a href="{{ url('Horario/pdf?search=' . request('search')) }}" class="btn btn-success" target="_blank">PDF</a>
        </div>
        <br>
        <div class="card mt-3">
            <form class="d-flex" method="GET" action="{{ url('Horario') }}">
                <input name="search" class="form-control me-2" type="search" placeholder="Escribe el nombre"
                    aria-label="Search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>

        <div class="container mt-4">
            <table class="table table-striped table-bordered">
                <thead class="table-danger">
                    <tr>
                        <th>#</th>
                        <th>Num. Aulas</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($detalles->count() > 0)
                        @foreach ($detalles as $key => $detalle)
                            <tr>
                                <td>{{ $detalle->id }}</td>
                                <td>{{ $detalle->NumAula }}</td>
                                <td>{{ $detalle->HoraInicio }}</td>
                                <td>{{ $detalle->HoraFinal }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <!-- <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>-->

                                        <a href="{{ url('/Horario/' . $detalle->id . '/edit') }}" class="btn btn-warning"><i
                                                class="fa fa-pencil-alt"></i></a>

                                        <form action="{{ url('/Horario/' . $detalle->id) }}" class="d-inline" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Desea eliminar?')" value="Borrar"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="7" class="text-center">No hay datos......</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('Horario.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('Horario.index') }}?limit=" + $('#limit').val() + '&search=' + $(
                    this).val()
            }
        })
    </Script>


@endsection
