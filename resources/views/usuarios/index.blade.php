@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="card-header d-inline-flex">
            <a href="{{ route('register') }}"" class="btn btn-success">CREAR</a>
        </div>
        <br>
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead class="table-danger">
                    <th style="display:none;">ID</th>
                    <th style="color:#000000;">Nombre</th>
                    <th style="color:#000000;">E-mail</th>
                    <th style="color:#000000;">Rol</th>
                    <th style="color:#000000;">Acciones</th>
                </thead>
                <tbody>
                    @if ($usuarios->count() > 0)
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td style="display: none;">{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @if (!empty($usuario->getRoleNames()))
                                        @foreach ($usuario->getRoleNames() as $rolName)
                                            <h5><span style="color: rgb(255, 0, 0) !important;"
                                                    class="badge badge-dark">{{ $rolName }}</span></h5>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}">Editar<i
                                            class="fa fa-pencil-alt"></i></a>

                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['usuarios.destroy', $usuario->id],
                                        'style' => 'display:inline',
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i> Borrar', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger',
                                        'onclick' => "return confirm('¿Estás seguro de que quieres eliminar este usuario?')",
                                    ]) !!}
                                    {!! Form::close() !!}
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
            {!! $usuarios->links() !!}
        </div>
    </div>
@endsection
