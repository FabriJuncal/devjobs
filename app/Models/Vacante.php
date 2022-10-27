<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    // De esta manera definimos que el campo "ultimo_dia" tendrá el formato "Fecha"
    // Ya que si no lo definimos se obtendra un error al querer formatear la fecha con los helpers de Laravel
    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function categoria()
    {
        // belongsTo() => Método que hace la relación de "uno a Muchos"
        //  -> 1er Parametro => Modelo con el que se quiere relacionar
        return $this->belongsTo(Categoria::class);
    }

    public function salario()
    {
        // belongsTo() => Método que hace la relación de "uno a Muchos"
        //  -> 1er Parametro => Modelo con el que se quiere relacionar
        return $this->belongsTo(Salario::class);
    }
}
