@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Horario/'.$detalle->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('Horario.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection