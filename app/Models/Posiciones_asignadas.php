<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posiciones_asignadas extends Model
{
    /** @use HasFactory<\Database\Factories\PosicionesAsignadasFactory> */
    use HasFactory;
    use SoftDeletes;
}
