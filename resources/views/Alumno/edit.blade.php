@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Alumno/'.$alumnos->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('Alumno.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection