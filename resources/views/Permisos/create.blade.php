@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Permisos') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('Permisos.form',['modo'=>'Crear']);

    </form>
</div>
@endsection
