@extends('layouts.app')

@section('content')
    <div class="container">
        
        {{-- Banner superior --}}
        <div class="bg-danger mb-4 rounded p-4 text-white shadow-sm">
            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center gap-3">
                    
                    <img src="{{ asset('img/logo-seoc.png') }}" 
                        alt="Logo Sindicato" 
                        style="height:50px; width:auto;">

                    <div>
                        <h2 class="mb-1">
                            Perfil del Afiliado
                        </h2>
                        
                    </div>

                </div>

               

            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="row">

                    <div class="row">

                        {{-- DNI Frente --}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header bg-danger text-white text-center fw-bold">
                                    DNI Frente
                                </div>
                                <div class="card-body text-center">

                                    @if ($afiliado->foto_dni)
                                        <img src="{{ asset('storage/' . $afiliado->foto_dni) }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px; cursor:pointer;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalFrente">
                                    @else
                                        <img src="{{ asset('storage/default-avatar.png') }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px;">
                                    @endif


                                </div>
                            </div>
                        </div>


                        {{-- DNI Dorso --}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header bg-danger text-white text-center fw-bold">
                                    DNI Dorso
                                </div>
                                <div class="card-body text-center">

                                    @if ($afiliado->foto_dni_dorso)
                                        <img src="{{ asset('storage/' . $afiliado->foto_dni_dorso) }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px; cursor:pointer;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDorso">
                                    @else
                                        <img src="{{ asset('storage/default-avatar.png') }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px;">
                                    @endif

                                </div>
                            </div>
                        </div>

                        {{-- Modal Frente --}}
                        @if($afiliado->foto_dni)
                        <div class="modal fade" id="modalFrente" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">DNI Frente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $afiliado->foto_dni) }}"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        {{-- Modal Dorso --}}
                        @if($afiliado->foto_dni_dorso)
                        <div class="modal fade" id="modalDorso" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">DNI Dorso</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $afiliado->foto_dni_dorso) }}"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- recibo de sueldo--}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header bg-danger text-white text-center fw-bold">
                                    recibo de sueldo
                                </div>
                                <div class="card-body text-center">

                                    @if ($afiliado->recibo_sueldo)
                                        <img src="{{ asset('storage/' . $afiliado->recibo_sueldo) }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px; cursor:pointer;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalRecibo">
                                    @else
                                        <img src="{{ asset('storage/default-avatar.png') }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px;">
                                    @endif


                                </div>
                            </div>
                        </div>

                        {{-- certificado de trabajo --}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header bg-danger text-white text-center fw-bold">
                                    Certificado de Trabajo
                                </div>
                                <div class="card-body text-center">

                                    @if ($afiliado->certificado_trabajo)
                                        <img src="{{ asset('storage/' . $afiliado->certificado_trabajo) }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px; cursor:pointer;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalCertificadoTrabajo">
                                    @else
                                        <img src="{{ asset('storage/default-avatar.png') }}"
                                            class="img-fluid img-thumbnail"
                                            style="max-height:250px;">
                                    @endif

                                </div>
                            </div>
                        </div>

                        {{-- Modal recibo de sueldo  --}}
                        @if($afiliado->recibo_sueldo)
                        <div class="modal fade" id="modalRecibo" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Recibo de Sueldo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $afiliado->recibo_sueldo) }}"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- certificado de trabajo --}}
                        @if($afiliado->certificado_trabajo )
                        <div class="modal fade" id="modalCertificadoTrabajo" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Certificado de Trabajo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $afiliado->certificado_trabajo) }}"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>

                    {{-- Datos personales --}}
                    <div class="col-md-8">

                        <hr>
                        <h5>Datos personales</h5>
                        <br>
                        <h5>{{ $afiliado->nombre }} {{ $afiliado->apellido }}</h5>

                        <p><strong>DNI:</strong> {{ $afiliado->dni }}</p>
                        <p><strong>CUIL:</strong> {{ $afiliado->cuil }}</p>
                        <p><strong>Nacionalidad:</strong> {{ $afiliado->nacionalidad }}</p>
                        <p><strong>Fecha de Nacimiento:</strong> 
                        {{ \Carbon\Carbon::parse($afiliado->fecha_nacimiento)->format('d/m/Y') }}
                        </p>
                        <p><strong>Email:</strong> {{ $afiliado->email ?? '-' }}</p>
                        <p><strong>Teléfono:</strong> {{ $afiliado->telefono ?? '-' }}</p>
                        <p>
                        <strong>Domicilio:</strong>
                        @if(
                            $afiliado->calle ||
                            $afiliado->numero ||
                            $afiliado->localidad ||
                            $afiliado->provincia ||
                            $afiliado->codigo_postal
                        )
                            {{ $afiliado->calle ?? '' }}
                            {{ $afiliado->numero ?? '' }}
                            
                            @if($afiliado->localidad)
                                , {{ $afiliado->localidad }}
                            @endif

                            @if($afiliado->provincia)
                                , {{ $afiliado->provincia }}
                            @endif

                            @if($afiliado->codigo_postal)
                                , CP: {{ $afiliado->codigo_postal }}
                            @endif
                        @else
                            -
                        @endif
                        </p>

                        <hr>
                        <h5>Datos Laborales</h5>
                        <p><strong>Empresa:</strong> {{ $afiliado->empresa }}</p>
                        <p><strong>Puesto:</strong> {{ $afiliado->puesto ?? '-' }}</p>
                        <p><strong>Sección:</strong> {{ $afiliado->seccion ?? '-' }}</p>
                        <p><strong>Tipo de Contrato:</strong> {{ $afiliado->tipo_contrato ?? '-' }}</p>
                        <p><strong>Jornada:</strong> {{ $afiliado->jornada_laboral ?? '-' }}</p>

                        <hr>
                        <h5>Datos Sindicales</h5>
                        <p><strong>Número de Afiliado:</strong> {{ $afiliado->numero_afiliado }}</p>
                        <p><strong>Fecha Afiliación:</strong> {{ $afiliado->fecha_afiliacion ?? '-' }}</p>
                        <p><strong>Delegación:</strong> {{ $afiliado->delegacion_sindical ?? '-' }}</p>

                            <strong>Estado:</strong>
                            @if ($afiliado->estado === 'pendiente')
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @elseif($afiliado->estado === 'aprobado')
                                <span class="badge bg-success">Aprobado</span>
                            @else
                                <span class="badge bg-danger">Rechazado</span>
                            @endif
                        </p>
                    </div>



                </div>
            </div>
        </div>

        <a href="{{ route('afiliados.index') }}" class="btn btn-secondary">
            ← Volver al listado
        </a>

        <a href="{{ route('afiliados.edit', $afiliado->id) }}" class="btn btn-warning">
            ✏ Editar Afiliado
        </a>
    </div>
@endsection
