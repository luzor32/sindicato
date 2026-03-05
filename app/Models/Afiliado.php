<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $fillable = [
        'numero_afiliado',
        'nombre',
        'apellido',
        'dni',
        'cuil',
        'nacionalidad',
        'fecha_nacimiento',
        'email',
        'telefono',
        'empresa',
        'localidad',
        'calle',
        'numero',
        'puesto',
        'seccion',
        'tipo_contrato',
        'jornada_laboral',
        'fecha_afiliacion',
        'delegacion_sindical',
        'provincia',
        'codigo_postal',
        'foto_dni',
        'foto_dni_dorso',
        'recibo_sueldo',
        'certificado_trabajo',
        'estado_solicitud',
        'estado_afiliado',
        'fecha_alta'=> 'datetime',
        'fecha_baja'=> 'datetime',
        'observaciones'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_alta' => 'date',
        'fecha_baja' => 'date',
    ];

       // ============================
    // ESTADOS DE SOLICITUD
    // ============================
    const SOLICITUD_PENDIENTE = 'pendiente';
    const SOLICITUD_APROBADO = 'aprobado';
    const SOLICITUD_RECHAZADO = 'rechazado';

    // ============================
    // ESTADOS SINDICALES
    // ============================
    const AFILIADO_ACTIVO = 'activo';
    const AFILIADO_SUSPENDIDO = 'suspendido';
    const AFILIADO_BAJA = 'baja';

    public function scopeEstadoSolicitud($query, $estado)
    {
        return $query->where('estado_solicitud', $estado);
    }

    public function scopeEstadoAfiliado($query, $estado)
    {
        return $query->where('estado_afiliado', $estado);
    }

    protected static function booted(){
        static::updating(function ($afiliado) {

        // Si se aprueba la solicitud
        if (
            $afiliado->isDirty('estado_solicitud') &&
            $afiliado->estado_solicitud === self::SOLICITUD_APROBADO
        ) {
            $afiliado->fecha_alta = now();
            $afiliado->estado_afiliado = self::AFILIADO_ACTIVO;
        }

        // Si pasa a baja
        if (
            $afiliado->isDirty('estado_afiliado') &&
            $afiliado->estado_afiliado === self::AFILIADO_BAJA
        ) {
            $afiliado->fecha_baja = now();
        }

    });
}
}
