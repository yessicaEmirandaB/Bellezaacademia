@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/MaestroCurso/'.$detalle->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('MaestroCurso.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection