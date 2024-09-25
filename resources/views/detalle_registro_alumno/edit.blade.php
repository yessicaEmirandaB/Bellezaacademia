@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/detalle_registro_alumno/'.$query->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('detalle_registro_alumno.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection
