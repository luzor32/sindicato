@extends('layouts.app')

@section('content')

<div class="container">

<h4 class="mb-4">
Editar Carga Familiar
</h4>

<div class="card shadow-sm">

<div class="card-body">

<form action="{{ route('carga_familiar.update',$familiar->id) }}" method="POST">

@csrf
@method('PUT')

<input type="hidden" name="afiliado_id" value="{{ $familiar->afiliado_id }}">

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nombre</label>
<input type="text"
name="nombre"
class="form-control"
value="{{ $familiar->nombre }}"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Apellido</label>
<input type="text"
name="apellido"
class="form-control"
value="{{ $familiar->apellido }}"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">DNI</label>
<input type="text"
name="dni"
class="form-control"
value="{{ $familiar->dni }}">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Parentesco</label>
<input type="text"
name="parentesco"
class="form-control"
value="{{ $familiar->parentesco }}"
required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Fecha de nacimiento</label>
<input type="date"
name="fecha_nacimiento"
class="form-control"
value="{{ $familiar->fecha_nacimiento }}">
</div>

</div>

<hr>

<div class="form-check">
<input type="checkbox"
class="form-check-input"
name="es_hijo"
value="1"
{{ $familiar->es_hijo ? 'checked' : '' }}>
<label class="form-check-label">Es hijo</label>
</div>

<div class="form-check">
<input type="checkbox"
class="form-check-input"
name="estudia"
value="1"
{{ $familiar->estudia ? 'checked' : '' }}>
<label class="form-check-label">Estudia</label>
</div>

<div class="form-check mb-3">
<input type="checkbox"
class="form-check-input"
name="discapacidad"
value="1"
{{ $familiar->discapacidad ? 'checked' : '' }}>
<label class="form-check-label">Discapacidad</label>
</div>

<button type="submit" class="btn btn-success">
<i class="fa-solid fa-save"></i> Actualizar
</button>

<a href="{{ route('carga_familiar.show',$familiar->afiliado_id) }}"
class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</div>

@endsection