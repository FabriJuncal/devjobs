<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacante_id',
        'user_id',
        'cv'
    ];

    public function user()
    {
        // belongsTo() => Método que hace la relación de "uno a Muchos"
        //  -> 1er Parametro => Modelo con el que se quiere relacionar
        return $this->belongsTo(User::class);
    }
}
