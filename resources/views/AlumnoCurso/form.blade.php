<h1><i class="fas fa-user-graduate"></i>{{ $modo }} Alumno Curso </h1>
<hr class="bg-primary border-2">

@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-md-6 mb-2">
        <strong> Nombre del Alumno: <span class="text-danger">*</span> </strong>
        <select name="Alumnos_id" id="Alumnos_id" class="form-control" required>
            <option value="">Seleccionar alumno</option>
            @foreach ($alumnos as $alumno)
            <option value="{{ $alumno->id }}">{{ $alumno->Nombres }} {{ $alumno->Apellidos }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-2">
        <strong> Nombre del Curso: <span class="text-danger">*</span> </strong>
        <select name="cursos_id" id="cursos_id" class="form-control" required>
            <option value="">Seleccionar curso</option>
            @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}">{{ $curso->nombrecurso }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div hidden class="col-md-4 mb-2">
        <label for="Calificacion">Calificación</label>
        <input type="number" name="Calificacion" id="Calificacion" class="form-control">
    </div>

</div>
<br>

<div class="row">
    <div class="col-md-6 text-start">
        <strong> Campos Requeridos: <span class="text-danger">*</span> </strong>
    </div>
    <div class="col-md-6 text-end">
        <a class="btn btn-secondary" href="{{ url('AlumnoCurso/') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
       
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{ $modo }} datos</button>
    </div>
   
</div>