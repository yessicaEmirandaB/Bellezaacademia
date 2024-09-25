@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/detalle_registro_alumno') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('detalle_registro_alumno.form',['modo'=>'Crear']);

    </form>
</div>
@endsection
