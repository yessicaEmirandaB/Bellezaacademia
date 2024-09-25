@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/detalle_registro_maestro') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('detalle_registro_maestro.form',['modo'=>'Crear']);

    </form>
</div>
@endsection
