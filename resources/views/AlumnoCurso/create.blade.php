@extends('layouts.app')
@section('content')

<div class="container">

    <form action="{{ url('/AlumnoCurso') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('AlumnoCurso.form',['modo'=>'Crear']);

    </form>
</div>
@endsection