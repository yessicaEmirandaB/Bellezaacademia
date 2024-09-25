<h1>{{ $modo }} Editar Registro de maestro </h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{$errors}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row pt-4">
    <div class="col-5">
        <div class="form-group">
            <label for="cursos_id">MAESTRO CON CURSOS ASIGNADOS</label>
            <select name="id_detalle_curso_maestro" id="id_detalle_curso_maestro" class="form-control" required>
            <option value="">Seleccionar una opción</option>
            @foreach ($cb_curso_maestros as $item)
                <option value="{{ $item->id_detalle_curso_maestros }}" @if($item->id_detalle_curso_maestros == $registro->id_detalle_curso_maestro) {{'selected'}} @endif>{{ $item->cursomaestro }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="cursos_id">Seleccionar materia</label>
            <select name="id_detalle_curso_materia" id="id_detalle_curso_materia" class="form-control" required>
            <option value="">Seleccionar materia</option>
            @foreach ($cb_curso_materias as $item)
                <option value="{{$item->id_detalle_curso_materias}}" @if($item->id_detalle_curso_materias == $registro->id_detalle_curso_materia) {{'selected'}} @endif>{{ $item->cursomateriahorarioaula }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col d-flex align-items-center pt-3">
        <input class="btn btn-success m-1" type="submit" value="{{ $modo }} datos">
        <a class="btn btn-primary m-1" href="{{url('detalle_registro_maestro/')}}">Regresar</a>
    </div>
</div>

