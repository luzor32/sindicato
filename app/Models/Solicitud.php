<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'afiliado_id',
        'estado_solicitud',
        'observaciones'
    ];

    /**
     * Relación con afiliado
     * Una solicitud pertenece a un afiliado
     */

    public function afiliado()
    {
        return $this->belongsTo(Afiliado::class);
    }
}
