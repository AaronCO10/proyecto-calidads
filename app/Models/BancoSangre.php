<?php

namespace App\Models;

use App\Models\TipoSangre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BancoSangre extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'tipo_sangre_id',
        'unidades',
    ];


    public function tiposangre()
    {
        return $this->belongsTo(TipoSangre::class,'tipo_sangre_id','id');
    }

}
