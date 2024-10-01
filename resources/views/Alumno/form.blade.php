<h1> <i class="fas fa-user-graduate"></i>
    {{ $modo }} Alumno </h1>
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
    <div class="col-md-4 mb-2">
        <strong> Apellidos: <span class="text-danger">*</span> </strong>
        <input type="text" class="form-control" name="Apellidos"
            value="{{ isset($alumnos->Apellidos) ? $alumnos->Apellidos : old('Apellidos') }}" id="Apellidos">
    </div>
    <div class="col-md-4 mb-2">
        <strong> Nombres: <span class="text-danger">*</span> </strong>
        <input type="text" class="form-control" name="Nombres"
            value="{{ isset($alumnos->Nombres) ? $alumnos->Nombres : old('Nombres') }}" id="Nombres">
    </div>


    <div class="col-md-4 mb-2">
        <strong> CI: <span class="text-danger">*</span> </strong>
        <input type="text" class="form-control" name="CI"
            value="{{ isset($alumnos->CI) ? $alumnos->CI : old('CI') }}" id="CI">
    </div>

    <div class="col-md-4 mb-2">
        <strong> Celular: <span class="text-danger">*</span></strong>
        <input type="text" class="form-control" name="Celular"
            value="{{ isset($alumnos->Celular) ? $alumnos->Celular : old('Celular') }}" id="Celular">
    </div>

    <div class="col-md-4 mb-2">
        <strong> Dirección: <span class="text-danger">*</span></strong>
        <input type="text" class="form-control" name="Direccion"
            value="{{ isset($alumnos->Direccion) ? $alumnos->Direccion : old('Direccion') }}" id="Direccion">
    </div>

    <div class="col-md-4 mb-2">
        <strong> Correo: </strong>
        <input type="text" class="form-control" name="Correo"
            value="{{ isset($alumnos->Correo) ? $alumnos->Correo : old('Correo') }}" id="Correo">
    </div>

    <div class="col-md-6 mb-2">
        <strong> Seleccione Foto: </strong>
        @if (isset($alumnos->Foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $alumnos->Foto }}" width="100"
                alt="" id="vistaPrevia">
        @else
            <img class="img-thumbnail img-fluid" src="" width="100" alt="" id="vistaPrevia">
        @endif
        <input type="file" class="form-control" name="Foto" value="" id="Foto">
    </div>


    <div class="col-md-6 mb-2">
        <strong> Seleccione Usuario: <span class="text-danger">*</span> </strong>
        <select name="user_id" id="user_id" class="form-control" required>
            <option value="">Seleccionar user</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6 text-start">
        <strong> Campos Requeridos: <span class="text-danger">*</span> </strong>
    </div>
    <div class="col-md-6 text-end">
        <a class="btn btn-primary" href="{{ url('Alumno/') }}"><i class="fas fa-arrow-left"></i> Regresar</a>
        {{-- <input class="btn btn<<-success" type="submit" value="{{ $modo }} datos"> --}}
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{ $modo }} datos</button>
    </div>
</div>
<script>
    document.getElementById('Foto').addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
        var file = event.target.files[0];
        if (file && file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('vistaPrevia').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(file);
        } else {
            alert('Por favor, selecciona un archivo de imagen válido.');
        }
    }
</script>
