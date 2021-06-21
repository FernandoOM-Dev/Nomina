<?php

namespace App\Repositories;

use App\Models\Empleado;

class EmpleadoRepository extends BaseRepository
{
    public function __construct(Empleado $empleado)
    {
        parent::__construct($empleado);
    }

    public function getEmployeeByCode(String $codigo)
    {
        $empleado = Empleado::where('codigo', '=', $codigo)->first();
        return $empleado;
    }

    public function activate(Empleado $empleado)
    {
        $empleado->estado = true;
        $empleado->update();
        return $empleado;
    }

    public function desactivate(Empleado $empleado)
    {
        $empleado->estado = false;
        $empleado->update();
        return $empleado;
    }

    public function getActivateEmployees()
    {
        $empleados = Empleado::where('estado', '=', true)->get();
        return $empleados;
    }

    public function getDisableEmployees()
    {
        $empleados = Empleado::where('estado', '=', false)->get();
        return $empleados;
    }

}
