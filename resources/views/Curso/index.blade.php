@extends('layouts.app')
@section('content')
<br>
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card-header d-inline-flex">
        @can('crear-cursos')
        <a href="{{url('Curso/create') }}" class="btn btn-success">Registrar nuevo curso</a>
        @endcan
        &nbsp;
        <!--  <a href="{{url('Curso/pdf') }}" class="btn btn-success" target="_blank">PDF</a>  Enlaces de paginación -->
        <a href="{{ url('Curso/pdf?search=' . request('search')) }}" class="btn btn-success" target="_blank">PDF</a>
    </div>

    <br>
    <div class="card mt-3">
        <form class="d-flex" method="GET" action="{{ url('Curso') }}">
            <input name="search" class="form-control me-2" type="search" placeholder="Escribe el nombre" aria-label="Search" value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th>Nombre del curso</th>
                    <th>Precio (bs)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($curso as $key => $cursos)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$cursos->nombrecurso}}</td>
                    <td>{{$cursos->precio}}</td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @can('ver-cursos')
                           <!-- <a href="" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i></a>-->
                            @endcan
                            @can('editar-cursos')
                            <a href="{{url('/Curso/'.$cursos->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                            @endcan
                            @can('borrar-cursos')
                             <form action="{{ url('/Curso/'.$cursos->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"  onclick="return confirm('¿Desea eliminar?')" value="Borrar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                
                            </form>
                            @endcan
                        </div>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection