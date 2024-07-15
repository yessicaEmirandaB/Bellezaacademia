@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Permisos/'.$permiso->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('Permisos.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection
