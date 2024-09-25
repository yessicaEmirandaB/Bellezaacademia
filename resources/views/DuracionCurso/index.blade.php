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
            <a href="{{ url('DuracionCurso/create') }}" class="btn btn-success">CREAR</a>
            &nbsp;
            <!--  <a href="{{ url('DuracionCurso/pdf') }}" class="btn btn-success" target="_blank">PDF</a>  Enlaces de paginación -->
            <a href="{{ url('DuracionCurso/pdf?search=' . request('search')) }}" class="btn btn-success"
                target="_blank">PDF</a>
        </div>
        <br>
        <div class="card mt-3">
            <form class="d-flex" method="GET" action="{{ url('DuracionCurso') }}">
                <input name="search" class="form-control me-2" type="search" placeholder="Escribe el nombre"
                    aria-label="Search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <br>
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead class="table-danger">
                    <tr>
                        <th>#</th>
                        {{-- <th>Cursos</th> --}}
                        <th>fecha Inicio</th>
                        <th>fecha Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($Duracioncurso->count() > 0)
                        @foreach ($Duracioncurso as $key => $Duracioncursos)
                            <tr>
                                <td>{{ $Duracioncursos->id }}</td>
                                {{-- <td>{{$Duracioncursos->cursos->nombrecurso}}</td> --}}
                                <td>{{ $Duracioncursos->fechaInicio }}</td>
                                <td>{{ $Duracioncursos->fechaFin }}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <!-- <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>-->

                                        <a href="{{ url('/DuracionCurso/' . $Duracioncursos->id . '/edit') }}"
                                            class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>

                                        <form action="{{ url('/DuracionCurso/' . $Duracioncursos->id) }}" class="d-inline"
                                            method="post">
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

@endsection
