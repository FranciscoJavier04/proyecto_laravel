<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PosicionesAsignada extends Model
{
    /** @use HasFactory<\Database\Factories\PosicionesAsignadasFactory> */
    use HasFactory;
    use SoftDeletes;

    // Definir los campos que se pueden asignar masivamente
    protected $guarded = [];

    // Relación con la tabla 'futbolistas'
    public function futbolista()
    {
        return $this->belongsTo(Futbolista::class, 'futbolista_id');
    }

    // Relación con la tabla 'posiciones'
    public function posicion()
    {
        return $this->belongsTo(Posicione::class, 'posicion_id');
    }
}
