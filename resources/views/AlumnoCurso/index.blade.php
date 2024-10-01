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
            <a href="{{ url('AlumnoCurso/create') }}" class="btn btn-success">Crear</a>
            &nbsp;
            <a href="{{ url('AlumnoCurso/pdf?search=' . request('search')) }}" class="btn btn-success"
                target="_blank">PDF</a>
            &nbsp;
            <a href="{{ url('AlumnoCurso/pdfcali?search=' . request('search')) }}" class="btn btn-success"
                target="_blank">PDF de Calificación</a>
        </div>
        <br>
        <div class="card mt-3">
            <form class="d-flex" method="GET" action="{{ url('AlumnoCurso') }}">
                <input name="search" class="form-control me-2" type="search" placeholder="Escribe el nombre"
                    aria-label="Search" value="{{ request('search') }}">
                <select name="estado" id="Estado" class="form-control me-2">
                    <option value="">Todos</option>
                    <option value="Aprobado" {{ request('estado') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                    <option value="Reprobado" {{ request('estado') == 'Reprobado' ? 'selected' : '' }}>Reprobado</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <div class="container mt-4">
            <table class="table table-striped table-bordered shadow p-3 mb-5 bg-body rounded">
                <thead class="table-danger">
                    <tr>
                        <th>#</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Costo</th>
                        <th>A Cuenta</th>
                        <th>Saldo</th>
                        <th>Calificación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($detalles->count() > 0)
                        @foreach ($detalles as $key => $detalle)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td> {{ $detalle->Nombres }} {{ $detalle->Apellidos }}</td>
                                <td> {{ $detalle->nombrecurso }} </td>
                                <td class="text-end"> {{ $detalle->precio }} </td>
                                <td class="text-end"> {{ $detalle->a_cuenta ?? 0 }} </td>
                                <td class="text-end"> {{ $detalle->precio - $detalle->a_cuenta }} </td>
                                <td> {{ $detalle->Calificacion ?? 0 }} </td>
                                <td>
                                    @if ($detalle->Calificacion > 51)
                                        <span class="badge bg-success">Aprobado</span>
                                    @else
                                        <span class="badge bg-danger">Reprobado</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('ver-alumnoscursos')
                                            <!--   <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                        @endcan
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#pagarCurso{{ $detalle->id }}">
                                            <i class="fa fa-money-bill-wave" aria-hidden="true"></i>
                                        </button>
                                        @include('AlumnoCurso.pagar-curso')

                                        @can('editar-alumnoscursos')
                                            <a href="{{ url('/AlumnoCurso/' . $detalle->id . '/edit') }}"
                                                class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('borrar-alumnoscursos')
                                            <form action="{{ url('/AlumnoCurso/' . $detalle->id) }}" class="d-inline"
                                                method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Desea eliminar?')" value="Borrar"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        @endcan
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
            {{ $detalles->appends(['search' => request('search'), 'estado' => request('estado')])->links() }}
        </div>
    </div>
@endsection
