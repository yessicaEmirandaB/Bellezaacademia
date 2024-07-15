@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/DuracionCurso/'.$Duracioncursos->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('DuracionCurso.form2',['modo'=>'Editar']);
    </form>
</div>
@endsection