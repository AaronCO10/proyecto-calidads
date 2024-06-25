<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin', 'activo','unidades_donadas'];

    public function solicitudes()
    {
        return $this->hasMany(SolicitudDonacion::class);
    }
}
