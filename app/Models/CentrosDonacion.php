<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrosDonacion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'latitud', 'longitud',];

}
