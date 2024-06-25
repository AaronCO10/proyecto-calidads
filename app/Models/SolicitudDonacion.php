<?php

namespace App\Models;

use App\Models\User;
use App\Models\Campania;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudDonacion extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'campania_id', 'talla', 'peso', 'acepta_terminos', 'estado'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campania()
    {
        return $this->belongsTo(Campania::class);
    }
}
