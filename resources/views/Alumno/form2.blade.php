<h1>{{ $modo }} AlumnoCurso </h1>

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
<label for="Apellidos"> Apellidos </label>
<input type="text" class="form-control" name="Apellidos" 
value="{{ isset($alumnos->Apellidos)?$alumnos->Apellidos:old('Apellidos')}}" id="Apellidos">
<br>
</div>

<div class="form-group">
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombres" value="{{isset($alumnos->Nombres)?$alumnos->Nombres:old('Nombres')}}" id="Nombres">
<br>
</div>

<div class="form-group">
<label for="CI"> CI </label>
<input type="text" class="form-control" name="CI" value="{{isset($alumnos->CI)?$alumnos->CI:old('CI')}}" id="CI">
<br>
</div>

<div class="form-group">
<label for="Direccion"> Direccion </label>
<input type="text" class="form-control" name="Direccion" value="{{isset($alumnos->Direccion)?$alumnos->Direccion:old('Direccion')}}" id="Direccion">
<br>
</div>

<div class="form-group">
<label for="Celular"> Celular </label>
<input type="text" class="form-control" name="Celular" value="{{isset($alumnos->Celular)?$alumnos->Celular:old('Celular')}}" id="Celular">
<br>
</div>

<div class="form-group">
<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" value="{{isset($alumnos->Correo)?$alumnos->Correo:old('Correo')}}" id="Correo">
<br>
</div>

<div class="form-group">
<label for="Foto"> Foto </label>
@if(isset($alumnos->Foto))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$alumnos->Foto}}" width="100" alt=""/>
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">
<br>
</div>


<div class="form-group">
    <label for="users">Seleccionar user</label>
    <select name="user_id" id="user_id" class="form-control" required>
    <option value="">Seleccionar user</option>
    @foreach ($users as $user)
        <option value="{{ $user->id }}"@if($user->id == $alumnos->user_id) {{'selected'}} @endif>{{ $user->name }}</option>
    @endforeach
    </select>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Alumno/')}}">Regresar</a>
<br>