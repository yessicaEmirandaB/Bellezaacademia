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
        @can('crear-alumnos')
            <div class="card-header d-inline-flex">
                <a href="{{ url('Alumno/create') }}" class="btn btn-success">Registrar nuevo estudiante</a>
                &nbsp;
                <!-- <a href="{{ url('Alumno/pdf') }}" class="btn btn-success" target="_blank">PDF</a>  Enlaces de paginación -->
                <a href="{{ url('Alumno/pdf?search=' . request('search')) }}" class="btn btn-success" target="_blank">PDF</a>
            </div>
        @endcan
        <br>
        <div class="card mt-3">
            <form class="d-flex" method="GET" action="{{ url('Alumno') }}">
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
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>CI</th>
                        <th>Dirección</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>User</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($alumno->count() > 0)
                        @foreach ($alumno as $key => $alumnos)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $alumnos->Apellidos }}</td>
                                <td>{{ $alumnos->Nombres }}</td>
                                <td>{{ $alumnos->CI }}</td>
                                <td>{{ $alumnos->Direccion }}</td>
                                <td>{{ $alumnos->Celular }}</td>
                                <td>{{ $alumnos->Correo }}</td>
                                <td>
                                    <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $alumnos->Foto }}"
                                        width="100" alt="" />
                                </td>
                                <td>{{ $alumnos->user_id }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('ver-alumnos')
                                            <!--   <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                        @endcan
                                        @can('editar-alumnos')
                                            <a href="{{ url('/Alumno/' . $alumnos->id . '/edit') }}" class="btn btn-warning"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('borrar-alumnos')
                                            <form action="{{ url('/Alumno/' . $alumnos->id) }}" class="d-inline" method="post">
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
        </div>
    </div>
@endsection
