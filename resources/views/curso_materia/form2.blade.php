<h1>{{ $modo }} Materia </h1>

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
    <label for="id_curso">Seleccionar curso</label>
    <select name="id_curso" id="id_curso" class="form-control" required>
    <option value="">Seleccionar curso</option>
    @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}"@if($curso->id == $materias->id_curso) {{'selected'}} @endif>{{ $curso->nombrecurso }}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
<label for="nombremateria"> nombremateria </label>
<input type="text" class="form-control" name="nombremateria" value="{{isset($materias->nombremateria)?$materias->nombremateria:old('nombremateria')}}" id="id_materia">
<br>
</div>
<div class="form-group">
    <label for="id_horario">Seleccionar curso</label>
    <select name="id_horario" id="id_horario" class="form-control" required>
    <option value="">Seleccionar curso</option>
    @foreach ($horarios as $horario)
        <option value="{{ $horario->id }}"@if($horario->id == $materias->id_horario) {{'selected'}} @endif>{{$horario->HoraInicio}} - {{$horario->HoraFinal}}</option>
    @endforeach
    </select>
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Materia/')}}">Regresar</a>
<br>