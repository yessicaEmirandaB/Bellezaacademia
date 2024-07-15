@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/curso_materia') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('curso_materia.form',['modo'=>'Crear']);

    </form>
</div>
@endsection
