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
            @can('crear-materias')
                <a href="{{ url('curso_materia/create') }}" class="btn btn-success">Asignar curso materia</a>
            @endcan
            &nbsp;
            <!--  <a href="{{ url('Ma   teria/pdf') }}" class="btn btn-success" target="_blank">PDF</a>  Enlaces de paginación -->
            <a href="{{ url('Materia/pdf?search=' . request('search')) }}" class="btn btn-success" target="_blank">PDF</a>
        </div>
        <br>
        <div class="card mt-3">
            <form class="d-flex" method="GET" action="{{ url('materia_curso') }}">
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
                        <th>Id</th>
                        <th>Cursos</th>
                        <th>Nombre de la materia</th>
                        <th>Horario</th>
                        <th>Aula</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($curso_materias->count() > 0)
                        @foreach ($curso_materias as $curso_materia)
                            <tr>
                                <td>{{ $curso_materia->id_detalle_curso_materias }}</td>
                                <td>{{ $curso_materia->nombrecurso }}</td>
                                <td>{{ $curso_materia->nombremateria }}</td>
                                <td>{{ $curso_materia->HoraInicio }} - {{ $curso_materia->HoraFinal }}</td>
                                <td>{{ $curso_materia->NumAula }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('ver-materias')
                                            <!--  <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                        @endcan
                                        @can('editar-materias')
                                            <a href="{{ url('/curso_materia/' . $curso_materia->id_detalle_curso_materias . '/edit') }}"
                                                class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('borrar-materias')
                                            <form
                                                action="{{ url('/curso_materia/' . $curso_materia->id_detalle_curso_materias) }}"
                                                class="d-inline" method="post">
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
