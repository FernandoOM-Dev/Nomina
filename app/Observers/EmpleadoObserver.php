<?php

namespace App\Observers;

use App\Models\Empleado;
use Illuminate\Support\Str;

class EmpleadoObserver
{
    public function creating(Empleado $empleado)
    {
        $count = Empleado::count();
        $slugable = substr($empleado->apellido_paterno, 0, 3).' '.substr($empleado->nombre, 0, 3);

        $codigo = Str::slug($slugable);

        $empleado->codigo = $codigo.'-'.$count+1;
    }
}
