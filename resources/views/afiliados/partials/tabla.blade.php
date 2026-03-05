<div class="table-responsive">
    <table class="table table-striped table-hover text-center align-middle">

        {{-- ================= HEADER ================= --}}
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

        {{-- ================= BODY ================= --}}
        <tbody>
            @forelse($afiliados as $afiliado)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $afiliado->numero_afiliado }}</td>

                    <td>
                        {{ $afiliado->nombre }} {{ $afiliado->apellido }}
                    </td>

                    <td>{{ $afiliado->dni }}</td>

                    <td>{{ $afiliado->empresa }}</td>

                    {{-- ESTADO --}}
                    <td>
                        @if ($afiliado->estado_solicitud === \App\Models\Afiliado::SOLICITUD_PENDIENTE)
                        <span class="badge bg-warning text-dark">Pendiente</span>

                        @elseif($afiliado->estado_solicitud === \App\Models\Afiliado::SOLICITUD_APROBADO)
                            <span class="badge bg-success">Aprobado</span>

                        @elseif($afiliado->estado_solicitud === \App\Models\Afiliado::SOLICITUD_RECHAZADO)
                            <span class="badge bg-danger">Rechazado</span>
                        @endif
                    </td>

                    {{-- FOTO DNI --}}
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

                    {{-- ACCIONES --}}
                    <td>
                        <div class="d-inline-flex gap-2">

                            <a href="{{ route('afiliados.show', $afiliado->id) }}"
                               class="btn btn-secondary btn-sm"
                               title="Ver">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('afiliados.edit', $afiliado->id) }}"
                               class="btn btn-secondary btn-sm"
                               title="Editar">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{ route('afiliados.destroy', $afiliado->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-secondary btn-sm"
                                        title="Borrar"
                                        onclick="return confirm('¿Eliminar afiliado?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="8" class="text-muted">
                        No hay afiliados registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

    {{-- PAGINACIÓN --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $afiliados->links() }}
    </div>
</div>