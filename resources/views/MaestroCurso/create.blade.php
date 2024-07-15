@extends('layouts.app')
@section('content')

<div class="container">

    <form action="{{ url('/MaestroCurso') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('MaestroCurso.form',['modo'=>'Crear']);

    </form>
</div>
@endsection