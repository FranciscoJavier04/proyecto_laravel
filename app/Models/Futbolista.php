<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Futbolista extends Model
{
    /** @use HasFactory<\Database\Factories\FutbolistaFactory> */
    use HasFactory;
    use SoftDeletes;

    // Definir los campos que se pueden asignar masivamente
    protected $guarded = [];

    // Relación con la tabla 'users'
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Puedes agregar otras relaciones si las necesitas, por ejemplo, con 'posiciones_asignadas'
    public function posicionesAsignadas()
    {
        return $this->hasMany(PosicionesAsignada::class, 'futbolista_id');
    }

    // Futbolista.php

    public function posiciones()
    {
        return $this->belongsToMany(Posicione::class, 'posiciones_asignadas', 'futbolista_id', 'posicion_id');
    }
}
