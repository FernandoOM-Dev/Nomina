<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'contrato',
    ];

    protected $attributes = [
        'estado' => true,
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];
}
