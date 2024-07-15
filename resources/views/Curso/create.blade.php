@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Curso') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('Curso.form',['modo'=>'Crear']);

    </form>
</div>
@endsection