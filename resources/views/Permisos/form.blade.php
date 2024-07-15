<h1>{{ $modo }} PERMISO </h1>

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
<label for="Permiso"> Nombre del Permiso </label>
<input type="text" class="form-control" name="name" id="name">
<br>
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Permisos/')}}">Regresar</a>
<br>
