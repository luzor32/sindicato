@extends('layouts.app')

@section('content')

<div class="container">

<h4 class="mb-4">Detalle de Familiar</h4>

<div class="card shadow-sm">

<div class="card-body">

<table class="table">

<tr>
<th>Nombre</th>
<td>{{ $familiar->nombre }}</td>
</tr>

<tr>
<th>Apellido</th>
<td>{{ $familiar->apellido }}</td>
</tr>

<tr>
<th>DNI</th>
<td>{{ $familiar->dni }}</td>
</tr>

<tr>
<th>Parentesco</th>
<td>{{ $familiar->parentesco }}</td>
</tr>

<tr>
<th>Fecha nacimiento</th>
<td>{{ $familiar->fecha_nacimiento }}</td>
</tr>

<tr>
<th>Es hijo</th>
<td>{{ $familiar->es_hijo ? 'SI' : 'NO' }}</td>
</tr>

<tr>
<th>Estudia</th>
<td>{{ $familiar->estudia ? 'SI' : 'NO' }}</td>
</tr>

<tr>
<th>Discapacidad</th>
<td>{{ $familiar->discapacidad ? 'SI' : 'NO' }}</td>
</tr>

</table>

<a href="{{ route('carga_familiar.show',$familiar->afiliado_id) }}"
class="btn btn-secondary">

Volver

</a>

</div>

</div>

</div>

@endsection