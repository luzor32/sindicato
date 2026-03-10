@extends('layouts.app')

@section('content')

<div class="container">

<h4 class="mb-4">
Carga Familiar de {{ $afiliado->nombre }} {{ $afiliado->apellido }}
</h4>

<div class="card shadow-sm">

<div class="card-body">

<table class="table table-striped text-center">

<thead class="table-danger">

<tr>
<th>#</th>
<th>Nombre</th>
<th>DNI</th>
<th>Parentesco</th>
<th>Estudia</th>
<th>Discapacidad</th>
<th>Acciones</th>
</tr>

</thead>

<tbody>

@forelse($afiliado->cargasFamiliares as $familiar)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $familiar->nombre }} {{ $familiar->apellido }}</td>

<td>{{ $familiar->dni }}</td>

<td>{{ $familiar->parentesco }}</td>

<td>
@if($familiar->estudia)
<span class="badge bg-info">Sí</span>
@else
No
@endif
</td>

<td>
@if($familiar->discapacidad)
<span class="badge bg-danger">Sí</span>
@else
No
@endif
</td>

    <td>

        <a href="{{ route('carga_familiar.edit',$familiar->id) }}"
            class="btn btn-warning btn-sm">
            <i class="fa fa-pen"></i>
        </a>

        <a href="{{ route('carga_familiar.detalle',$familiar->id) }}"
            class="btn btn-secondary btn-sm"
            title="Ver detalle">
            <i class="fa-solid fa-eye"></i>
        </a>

        <form action="{{ route('carga_familiar.destroy',$familiar->id) }}"
            method="POST"
            style="display:inline-block">

            @csrf
            @method('DELETE')

            <button type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Eliminar familiar?')">

            <i class="fa-solid fa-trash"></i>

            </button>

         </form>

    </td>
    

</tr>

@empty

<tr>

<td colspan="7">No tiene carga familiar registrada</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

@endsection