@extends('layouts.app')

@section('content')

<div class="container">

<h3>Carga Familiar de {{ $afiliado->nombre }} {{ $afiliado->apellido }}</h3>

<div class="card">

<div class="card-body">

<form method="POST" action="{{ route('carga_familiar.store') }}">

@csrf

<input type="hidden" name="afiliado_id" value="{{ $afiliado->id }}">

<div class="row">

<div class="col-md-6 mb-3">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Apellido</label>
<input type="text" name="apellido" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>DNI</label>
<input type="text" name="dni" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>Parentesco</label>

<select name="parentesco" class="form-control">

<option value="">Seleccione</option>
<option value="Hijo">Hijo</option>
<option value="Hija">Hija</option>
<option value="Esposo">Esposo</option>
<option value="Esposa">Esposa</option>

</select>

</div>

<div class="col-md-4 mb-3">
<label>Fecha nacimiento</label>
<input type="date" name="fecha_nacimiento" class="form-control">
</div>

</div>

<hr>

<h5>Información adicional</h5>

<div class="row">

<div class="col-md-4">

<div class="form-check">

<input class="form-check-input" type="checkbox" name="es_hijo" value="1">

<label class="form-check-label">
Es hijo
</label>

</div>

</div>

<div class="col-md-4">

<div class="form-check">

<input class="form-check-input" type="checkbox" name="estudia" value="1">

<label class="form-check-label">
Estudia
</label>

</div>

</div>

<div class="col-md-4">

<div class="form-check">

<input class="form-check-input" type="checkbox" name="discapacidad" value="1">

<label class="form-check-label">
Discapacidad
</label>

</div>

</div>

</div>

<br>

<button type="submit" class="btn btn-success">

Guardar familiar

</button>

</form>

</div>

</div>

</div>

@endsection