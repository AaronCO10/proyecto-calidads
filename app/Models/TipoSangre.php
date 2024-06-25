<?php

namespace App\Models;

use App\Models\Donacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoSangre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];


    public function donaciones()
    {
        return $this->hasMany(Donacion::class, 'tipo_sangre_id', 'id');
    }
}
