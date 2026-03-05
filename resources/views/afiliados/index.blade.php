@extends('layouts.app')

@section('content')
    {{-- Banner superior --}}
    <div class="bg-danger mb-4 rounded p-4 text-white shadow-sm">
        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                
                <img src="{{ asset('img/logo-seoc.png') }}" 
                    alt="Logo Sindicato" 
                    style="height:50px; width:auto;">

                <div>
                    <h2 class="mb-1">
                        SEOC
                    </h2>
                    <p class="mb-0">
                        Administración y control de afiliados
                    </p>
                </div>

            </div>

            <div>
                <a href="{{ route('afiliados.create') }}" class="btn btn-light">
                    <i class="fas fa-plus"></i> Nuevo Afiliado
                </a>
            </div>

        </div>
    </div>

    @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <form method="GET" action="{{ route('afiliados.index') }}" class="row g-2 mb-3">

        <div class="col-md-4">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por DNI, nombre o apellido"
                value="{{ request('buscar') }}">
        </div>

        <div class="col-md-3">
            <select name="estado" class="form-select">
                <option value="">-- Filtrar por Estado --</option>
                <option value="Pendiente" {{ request('estado_solicitud') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Aprobado" {{ request('estado_solicitud') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="Rechazado" {{ request('estado_solicitud') == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary w-100">Buscar</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('afiliados.index') }}" class="btn btn-secondary w-100">Limpiar</a>
        </div>

    </form>
    <div class="card shadow-sm">
    <div class="card-body">

        <div id="tabla-afiliados">
            @include('afiliados.partials.tabla')
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    function cargarTabla(url) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('tabla-afiliados').innerHTML = data;
        });
    }

    // Capturar submit del formulario
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const params = new URLSearchParams(new FormData(this)).toString();
        cargarTabla(this.action + '?' + params);
    });

    // Capturar click en paginación
    document.addEventListener('click', function (e) {
        const link = e.target.closest('.pagination a');
        if (link) {
            e.preventDefault();
            cargarTabla(link.href);
        }
    });

    // Capturar click en ordenamiento
    document.addEventListener('click', function (e) {
        const link = e.target.closest('th a');
        if (link) {
            e.preventDefault();
            cargarTabla(link.href);
        }
    });

});
</script>
@endsection
