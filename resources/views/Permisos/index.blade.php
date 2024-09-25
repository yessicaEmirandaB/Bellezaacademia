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
            <a href="{{ url('Permisos/create') }}" class="btn btn-success">Registrar nuevo Permiso</a>
        </div>
        <br>
        <div class="card mt-3">
            <form class="d-flex" method="GET" action="{{ url('Aula') }}">
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
                        <th>id</th>
                        <th>Nombre de Permiso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($permisos->count() > 0)
                        @foreach ($permisos as $key => $permiso)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $permiso->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <!--  <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>-->

                                        <a href="{{ url('/Permisos/' . $permiso->id . '/edit') }}" class="btn btn-warning"><i
                                                class="fa fa-pencil-alt"></i></a>

                                        <form action="{{ url('/Permisos/' . $permiso->id) }}" class="d-inline" method="post">
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
        <div class="pagination justify-content-end">
            {!! $permisos->links() !!}
        </div>
    </div>
@endsection
