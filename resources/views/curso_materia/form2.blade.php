<h1>{{ $modo }} Curso Materia </h1>

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
    <label for="cursos_id">Seleccionar curso</label>
    <select name="id_curso" id="id_curso" class="form-control" required>
    <option value="">Seleccionar curso</option>
    @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}"@if($curso->id == $curso_materia->id_curso ) {{'selected'}} @endif>{{ $curso->nombrecurso }}</option>
    @endforeach
    </select>
</div>
<div class="form-group">
    <label for="id_materia ">Seleccionar materia</label>
    <select name="id_materia" id="id_materia" class="form-control" required>
    <option value="">Seleccionar materia</option>
    @foreach ($materias as $materia)
        <option value="{{ $materia->id }}"@if($materia->id == $curso_materia->id_materia) {{'selected'}} @endif>{{ $materia->nombremateria  }}</option>
    @endforeach
    </select>
</div>

<div class="form-group mb-2">
    <label for="id_horario ">Seleccionar horario</label>
    <select name="id_horario" id="id_horario" class="form-control" required>
    <option value="">Seleccionar horario</option>
    @foreach ($horarios as $horario)
        <option value="{{ $horario->id }}"@if($horario->id == $curso_materia->id_horario) {{'selected'}} @endif> <strong>horario: </strong>  {{$horario->HoraInicio}} - {{ $horario->HoraFinal}}&nbsp;&nbsp;Aula:({{$horario->aulas->NumAula}})</option>
    @endforeach
    </select>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{url('curso_materia/')}}">Regresar</a>
<br>
