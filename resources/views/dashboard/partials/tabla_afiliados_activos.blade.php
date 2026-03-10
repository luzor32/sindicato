<div class="table-responsive">

<table class="table table-striped table-hover text-center align-middle">

<thead class="table-danger">

<tr>
<th>#</th>
<th>N° Afiliado</th>
<th>Nombre</th>
<th>DNI</th>
<th>Empresa</th>
<th>Estado</th>
<th>DNI</th>
<th>Acciones</th>
</tr>

</thead>

<tbody>

@forelse($afiliadosActivos as $afiliado)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $afiliado->numero_afiliado }}</td>

<td>
{{ $afiliado->nombre }} {{ $afiliado->apellido }}
</td>

<td>{{ $afiliado->dni }}</td>





<td>{{ $afiliado->empresa }}</td>

<td>
<span class="badge bg-success">Activo</span>
</td>




<td>

@if ($afiliado->foto_dni)

<a href="{{ asset('storage/'.$afiliado->foto_dni) }}" target="_blank">

<img src="{{ asset('storage/'.$afiliado->foto_dni) }}"
width="60"
height="60"
style="object-fit:cover"
class="img-thumbnail shadow-sm">

</a>

@else

<span class="text-muted">Sin foto</span>

@endif

</td>

<td>

<div class="d-inline-flex gap-2">

<a href="{{ route('afiliados.show', $afiliado->id) }}"
class="btn btn-secondary btn-sm" title="Ver perfil de afiliado ">

<i class="fas fa-eye"></i>

</a>

<a href="{{ route('afiliados.edit', $afiliado->id) }}"
class="btn btn-secondary btn-sm" title="Editar afiliado">

<i class="fas fa-pen"></i>

</a>

<a href="{{ route('carga_familiar.create',$afiliado->id) }}" 
class="btn btn-warning btn-sm" title="Agregar carga familiar">

<i class="fa-solid fa-user-plus"></i>

</a>

<a href="{{ route('carga_familiar.show',$afiliado->id) }}"
class="btn btn-info btn-sm" title="Ver carga familiar">

<i class="fa fa-users"></i>

</a>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="8" class="text-muted">

No hay afiliados activos.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>