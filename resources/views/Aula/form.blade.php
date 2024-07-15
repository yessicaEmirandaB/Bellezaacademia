<h1>{{ $modo }} Aula </h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{$errors}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
<label for="NumAula"> NumAula </label>
<input type="text" class="form-control" name="NumAula" value="{{isset($aulas->NumAula)?$aulas->NumAula:old('NumAula')}}" id="NumAula">
<br>
</div>

<div class="form-group">
<label for="Capacidad"> Capacidad </label>
<input type="text" class="form-control" name="Capacidad" value="{{isset($aulas->Capacidad)?$aulas->Capacidad:old('Capacidad')}}" id="Capacidad">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Aula/')}}">Regresar</a>
<br>