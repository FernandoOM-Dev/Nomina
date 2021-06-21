<?php

namespace App\Observers;

use App\Models\Empleado;
use Illuminate\Support\Str;

class EmpleadoObserver
{
    public function creating(Empleado $empleado)
    {
        $count = Empleado::count();
        $slugable = $empleado->nombre.' '.$empleado->apellido_paterno;

        $codigo = Str::slug($slugable);

        $empleado->codigo = $codigo.'-'.$count+1;
    }
}
