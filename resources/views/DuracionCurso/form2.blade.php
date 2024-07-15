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
    <label for="cursos_id">Curso</label>
    <select name="cursos_id" id="cursos_id" class="form-control" required>
    <option value="">Seleccionar curso</option>
    @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}"@if($curso->id == $Duracioncursos->cursos_id) {{'selected'}} @endif>{{ $curso->nombrecurso }}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
<label for="fechaInicio"> Fecha Inicio </label>
<input type="text" class="form-control" name="fechaInicio" value="{{isset($Duracioncursos->fechaInicio)?$Duracioncursos->fechaInicio:old('fechaInicio')}}" id="fechaInicio">
<br>
</div>

<div class="form-group">
<label for="fechaFin"> Fecha Final </label>
<input type="text" class="form-control" name="fechaFin" value="{{isset($Duracioncursos->fechaFin)?$Duracioncursos->fechaFin:old('fechaFin')}}" id="fechaFin">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Materia/')}}">Regresar</a>
<br>