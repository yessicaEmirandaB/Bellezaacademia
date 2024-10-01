<h1>{{ $modo }} AlumnoCurso </h1>

@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
</div>
@endif




<div class="form-group">
    <label for="alumnos">Nombre del Alumno</label>
    <select name="Alumnos_id" id="Alumnos_id" class="form-control" required>
        <option value="">Seleccionar alumno</option>
        @foreach ($alumnos as $alumno)
        <option value="{{ $alumno->id }}" @if ($alumno->id == $detalle->Alumnos_id) {{ 'selected' }} @endif>
            {{ $alumno->Nombres }} {{ $alumno->Apellidos }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="cursos_id">Nombre del curso para la inscripcion</label>
    <select name="cursos_id" id="cursos_id" class="form-control" required>
        <option value="">Seleccionar curso</option>
        @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}" @if ($curso->id == $detalle->cursos_id) {{ 'selected' }} @endif>
            {{ $curso->nombrecurso }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="Calificacion">Calificación</label>
    <input type="number" name="Calificacion" id="Calificacion" class="form-control" value="{{ $detalle->Calificacion }}" required>
</div>
<br>

<div class="modal-footer d-flex justify-content-start">
    <a class="btn btn-secondary" href="{{ url('AlumnoCurso/') }}">
        <i class="fas fa-times"></i> Regresar
    </a>
    <button class="btn btn-success" type="submit">
        <i class="fas fa-check"></i> {{ $modo }} datos
    </button>
</div>
