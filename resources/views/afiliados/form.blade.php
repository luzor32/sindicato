@csrf

<div class="row">

    {{-- DATOS PERSONALES --}}
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control"
            value="{{ old('nombre', $afiliado->nombre ?? '') }}">
        @error('nombre')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control"
            value="{{ old('apellido', $afiliado->apellido ?? '') }}">
        @error('apellido')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" name="dni" id="dni" class="form-control"
            value="{{ old('dni', $afiliado->dni ?? '') }}">
        @error('dni')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="cuil" class="form-label">CUIL</label>
        <input type="text" name="cuil" id="cuil" class="form-control"
            value="{{ old('cuil', $afiliado->cuil ?? '') }}">
        @error('cuil')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="nacionalidad" class="form-label">Nacionalidad</label>
        <input type="text" name="nacionalidad" id="nacionalidad" class="form-control"
            value="{{ old('nacionalidad', $afiliado->nacionalidad ?? '') }}">
        @error('nacionalidad')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
            value="{{ old('fecha_nacimiento', isset($afiliado->fecha_nacimiento) ? $afiliado->fecha_nacimiento->format('Y-m-d') : '') }}"
            max="{{ date('Y-m-d') }}" min="{{ date('Y-m-d', strtotime('-100 years')) }}">
        @error('fecha_nacimiento')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control"
            value="{{ old('email', $afiliado->email ?? '') }}">
        @error('email')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" id="telefono" class="form-control"
            value="{{ old('telefono', $afiliado->telefono ?? '') }}">
        @error('telefono')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- DOMICILIO --}}
    <div class="mb-3">
        <label>Provincia</label>
        <input type="text" name="provincia" class="form-control"
            value="{{ old('provincia', $afiliado->provincia ?? '') }}">
        @error('provincia')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror    
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Localidad</label>
        <input type="text" name="localidad" class="form-control"
            value="{{ old('localidad', $afiliado->localidad ?? '') }}">
        @error('localidad')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Calle</label>
        <input type="text" name="calle" class="form-control" value="{{ old('calle', $afiliado->calle ?? '') }}">
        @error('calle')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Número</label>
        <input type="text" name="numero" class="form-control" value="{{ old('numero', $afiliado->numero ?? '') }}">
        @error('numero')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Código Postal</label>
        <input type="text" name="codigo_postal" class="form-control"
            value="{{ old('codigo_postal', $afiliado->codigo_postal ?? '') }}">
        @error('codigo_postal')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror    
    </div>

    {{-- DATOS LABORALES --}}
    <hr>
    <h5>Datos Laborales</h5>

    <div class="col-md-12 mb-3">
        <label for="empresa" class="form-label">Empresa</label>
        <input type="text" name="empresa" class="form-control"
            value="{{ old('empresa', $afiliado->empresa ?? '') }}">
        @error('empresa')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror    
    </div>

    <div class="mb-3">
        <label>Puesto / Categoría</label>
        <input type="text" name="puesto" class="form-control"
            value="{{ old('puesto', $afiliado->puesto ?? '') }}">
        @error('puesto')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror    
    </div>

    <div class="mb-3">
        <label>Sección</label>
        <input type="text" name="seccion" class="form-control"
            value="{{ old('seccion', $afiliado->seccion ?? '') }}">
        @error('seccion')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror    
    </div>

    <div class="mb-3">
        <label class="form-label">Tipo de Contrato</label>

        <select name="tipo_contrato"
            class="form-control @error('tipo_contrato') is-invalid @enderror">

            <option value="">-- Seleccione --</option>

            <option value="Planta Permanente"
                {{ old('tipo_contrato', $afiliado->tipo_contrato ?? '') == 'Planta Permanente' ? 'selected' : '' }}>
                Planta Permanente
            </option>

            <option value="Temporal"
                {{ old('tipo_contrato', $afiliado->tipo_contrato ?? '') == 'Temporal' ? 'selected' : '' }}>
                Temporal
            </option>

        </select>

        @error('tipo_contrato')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Jornada Laboral</label>

        <select name="jornada_laboral"
            class="form-control @error('jornada_laboral') is-invalid @enderror">

            <option value="">-- Seleccione --</option>

            <option value="Jornada Completa"
                {{ old('jornada_laboral', $afiliado->jornada_laboral ?? '') == 'Jornada Completa  ' ? 'selected' : '' }}>
                Jornada Completa
            </option>

            <option value="Medio Jornal"
                {{ old('jornada_laboral', $afiliado->jornada_laboral ?? '') == 'Medio Jornal' ? 'selected' : '' }}>
                Medio Jornal
            </option>

        </select>

        @error('jornada_laboral')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- DATOS SINDICALES --}}
    <hr>
    <h5>Datos Sindicales</h5>

   

    <div class="mb-3">
        <label>Delegación Sindical</label>
        <input type="text" name="delegacion_sindical" class="form-control"
            value="{{ old('delegacion_sindical', $afiliado->delegacion_sindical ?? '') }}">
        @error('delegacion_sindical')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror    
    </div>

    {{-- ESTADO DEL AFILIADO SOLO SI LA SOLICITUD ESTÁ APROBADA --}}
    @if (isset($afiliado) && $afiliado->estado_solicitud === 'aprobado')
        <hr>
        <h5>Estado Sindical</h5>
        <div class="mb-3">
            <label>Estado del Afiliado</label>
            <select name="estado_afiliado" class="form-control">
                <option value="activo"
                    {{ old('estado_afiliado', $afiliado->estado_afiliado ?? '') == 'activo' ? 'selected' : '' }}>Activo
                </option>
                <option value="suspendido"
                    {{ old('estado_afiliado', $afiliado->estado_afiliado ?? '') == 'suspendido' ? 'selected' : '' }}>
                    Suspendido</option>
                <option value="baja"
                    {{ old('estado_afiliado', $afiliado->estado_afiliado ?? '') == 'baja' ? 'selected' : '' }}>Baja
                </option>
            </select>
        </div>
    @endif

    {{-- FOTOS DNI --}}
    <hr>
    <div class="mb-3">
        <label for="foto_dni" class="form-label">Foto DNI Frente</label>
        <input type="file" name="foto_dni" class="form-control">
        @if (isset($afiliado) && $afiliado->foto_dni)
            <img src="{{ asset('storage/' . $afiliado->foto_dni) }}" width="200" class="img-thumbnail mt-2">
        @endif
        
    </div>

    <div class="mb-3">
        <label for="foto_dni_dorso" class="form-label">Foto DNI Dorso</label>
        <input type="file" name="foto_dni_dorso" class="form-control">
        @if (isset($afiliado) && $afiliado->foto_dni_dorso)
            <img src="{{ asset('storage/' . $afiliado->foto_dni_dorso) }}" width="200"
                class="img-thumbnail mt-2">
        @endif
    </div>

    <hr>
    <h5>Documentación Laboral</h5>

    <div class="mb-3">
        <label class="form-label">Recibo de Sueldo</label>
        <input type="file" name="recibo_sueldo" class="form-control">

        @if (isset($afiliado) && $afiliado->recibo_sueldo)
            <img src="{{ asset('storage/' . $afiliado->recibo_sueldo) }}"
                width="200"
                class="img-thumbnail mt-2">
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Certificado de Trabajo</label>
        <input type="file" name="certificado_trabajo" class="form-control">

        @if (isset($afiliado) && $afiliado->certificado_trabajo)
            <img src="{{ asset('storage/' . $afiliado->certificado_trabajo) }}"
                width="200"
                class="img-thumbnail mt-2">
        @endif
    </div>
</div>

{{-- BOTONES --}}
<button type="submit" class="btn btn-primary">{{ $modo }}</button>
<a href="{{ route('afiliados.index') }}" class="btn btn-secondary">Volver</a>
