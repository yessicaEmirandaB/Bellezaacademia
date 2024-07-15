@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Aula/'.$aulas->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('Aula.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection