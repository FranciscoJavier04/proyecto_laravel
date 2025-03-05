<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posicione extends Model
{
    /** @use HasFactory<\Database\Factories\PosicioneFactory> */
    use HasFactory;
    use SoftDeletes;

    // Posicion.php

    public function futbolistas()
    {
        return $this->belongsToMany(Futbolista::class, 'posiciones_asignadas', 'posicion_id', 'futbolista_id');
    }
}
