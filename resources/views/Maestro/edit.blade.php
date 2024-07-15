@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Maestro/'.$maestros->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('Maestro.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection