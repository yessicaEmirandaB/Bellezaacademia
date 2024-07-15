@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Materia/'.$materias->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('Materia.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection