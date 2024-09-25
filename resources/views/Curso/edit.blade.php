@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Curso/'.$cursos->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('Curso.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection
