@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/curso_materia/'.$curso_materia->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('curso_materia.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection
