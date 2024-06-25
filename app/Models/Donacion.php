<?php

namespace App\Models;

use App\Models\SolicitudDonacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitud_id',
        'unidades'
    ];

    // Relación con SolicitudDonacion
    public function solicitudDonacion()
    {
        return $this->belongsTo(SolicitudDonacion::class, 'solicitud_id');
    }
}
