<h1>{{ $modo }} Maestro </h1>

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

    <label for="apellidos"> Apellidos </label>
    <input type="text" class="form-control" name="apellidos" value="{{ isset($maestros->apellidos)?$maestros->apellidos:old('apellidos')}}" id="apellidos">
    <br>
</div>

<div class="form-group">
    <label for="nombres"> Nombre </label>
    <input type="text" class="form-control" name="nombres" value="{{isset($maestros->nombres)?$maestros->nombres:old('nombres')}}" id="nombres">
    <br>
</div>

<div class="form-group">
    <label for="ci"> CI </label>
    <input type="text" class="form-control" name="ci" value="{{isset($maestros->ci)?$maestros->ci:old('ci')}}" id="ci">
    <br>
</div>

<div class="form-group">
    <label for="direccion"> Direccion </label>
    <input type="text" class="form-control" name="direccion" value="{{isset($maestros->direccion)?$maestros->direccion:old('direccion')}}" id="direccion">
    <br>
</div>

<div class="form-group">
    <label for="celular"> Celular </label>
    <input type="text" class="form-control" name="celular" value="{{isset($maestros->celular)?$maestros->celular:old('celular')}}" id="celular">
    <br>
</div>

<div class="form-group">
    <label for="correo"> Correo </label>
    <input type="text" class="form-control" name="correo" value="{{isset($maestros->correo)?$maestros->correo:old('correo')}}" id="correo">
    <br>
</div>

<div class="form-group">
    <label for="Foto"> Foto </label>
    @if(isset($maestros->Foto))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$maestros->Foto}}" width="100" alt="" />
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto">
    <br>
</div>

<div class="form-group">
    <label for="especialidad"> Especialidad </label>
    <input type="text" class="form-control" name="especialidad" value="{{isset($maestros->especialidad)?$maestros->especialidad:old('especialidad')}}" id="especialidad">
    <br>
</div>

<div class="form-group">
    <label for="users">Seleccionar user</label>
    <select name="user_id" id="user_id" class="form-control" required>
    <option value="">Seleccionar user</option>
    @foreach ($users as $user)
        <option value="{{ $user->id }}"@if($user->id == $maestros->user_id) {{'selected'}} @endif>{{ $user->name }}</option>
    @endforeach
    </select>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Maestro/')}}">Regresar</a>
<br>