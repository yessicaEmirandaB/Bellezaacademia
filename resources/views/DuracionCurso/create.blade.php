@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/DuracionCurso') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('DuracionCurso.form',['modo'=>'Crear']);

    </form>
</div>
@endsection