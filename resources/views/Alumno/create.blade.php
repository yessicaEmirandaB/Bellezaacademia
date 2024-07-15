@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Alumno') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('Alumno.form',['modo'=>'Crear']);

    </form>
</div>
@endsection