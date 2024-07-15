@extends('layouts.app')
@section('content')

<div class="container">

    <form action="{{ url('/Horario') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('Horario.form',['modo'=>'Crear']);

    </form>
</div>
@endsection