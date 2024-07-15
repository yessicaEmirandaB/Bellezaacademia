@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/AlumnoCurso/'.$detalle->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('AlumnoCurso.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection