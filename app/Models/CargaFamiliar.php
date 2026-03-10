<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargaFamiliar extends Model
{
    protected $table = 'cargas_familiares';
    protected $fillable = [

        'afiliado_id',
        'nombre',
        'apellido',
        'dni',
        'parentesco',
        'es_hijo',
        'estudia',
        'discapacidad',
        'fecha_nacimiento'

    ];

    public function afiliado()
    {
        return $this->belongsTo(Afiliado::class);
    }

}