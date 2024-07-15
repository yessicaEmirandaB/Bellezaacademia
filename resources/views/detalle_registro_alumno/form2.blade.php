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
    <label for="cursos_id">Seleccionar curso</label>
    <select name="cursos_id" id="cursos_id" class="form-control" required>
    <option value="">Seleccionar curso</option>
    @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}"@if($curso->id == $materias->cursos_id) {{'selected'}} @endif>{{ $curso->nombrecurso }}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
<label for="nombremateria"> nombremateria </label>
<input type="text" class="form-control" name="nombremateria" value="{{isset($materias->nombremateria)?$materias->nombremateria:old('nombremateria')}}" id="nombremateria">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Materia/')}}">Regresar</a>
<br>