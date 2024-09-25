<h1>{{ $modo }} Registro de Alumno</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{$errors}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row pt-3">
    <div class="col-5">
        <div class="form-group">
            <label for="id_detalle_alumno_curso">Alumnos con Curso</label>
            <select name="id_detalle_alumno_curso" id="id_detalle_alumno_curso" class="form-control" required>
            <option value="">Seleccionar un opción</option>
            @foreach ($cbalumnocursoduracions as $item)
                <option value="{{ $item->id_alumnoscursos }}"@if($item->id_alumnoscursos == $query->id_detalle_alumno_curso) {{'selected'}} @endif>{{ $item->alumnocursoduracion }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label for="id_detalle_curso_materia">Cursos con materias Asignadas</label>
            <select name="id_detalle_curso_materia" id="id_detalle_curso_materia" class="form-control" required>
            <option value="">Seleccionar un opción</option>
            @foreach ($cbcursomaterias as $item)
                <option value="{{ $item->id_detalle_curso_materias }}"@if($item->id_detalle_curso_materias == $query->id_detalle_curso_materia) {{'selected'}} @endif>{{ $item->cursomateriahorarioaula }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-2 d-flex align-items-center mt-3">
        <input class="btn btn-success m-1" type="submit" value="{{ $modo }} datos">
        <a class="btn btn-primary m-1" href="{{url('detalle_registro_alumno/')}}">Regresar</a>
    </div>
</div>



