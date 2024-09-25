<h1>{{ $modo }} MaestroCurso </h1>

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
    <label for="nombres">Nombre del Maestro </label>
    <select name="Maestros_id" id="Maestros_id" class="form-control" required>
    <option value="">Seleccionar Maestro</option>
    @foreach ($maestros as $maestro)
        <option value="{{ $maestro->id }}">{{$maestro->nombres}}  {{$maestro->apellidos}}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nombrecurso">Nombre del curso </label>
    <select name="cursos_id" id="cursos_id" class="form-control" required>
    <option value="">Seleccionar curso</option>
    @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}">{{$curso->nombrecurso}}</option>
    @endforeach
    </select>
</div>
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('MaestroCurso/')}}">Regresar</a>
<br>
