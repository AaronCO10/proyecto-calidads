<?php

namespace App\Models;

use App\Models\TipoSangre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfusion extends Model
{
    use HasFactory;

    protected $table = 'transfusiones';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'sexo',
        'tipo_sangre_id',
        'unidades'
    ];

    public function tipoSangre()
    {
        return $this->belongsTo(TipoSangre::class);
    }

}
