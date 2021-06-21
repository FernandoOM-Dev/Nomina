<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::where('estado', '=', true)->get();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_disable()
    {
        $empleados = Empleado::where('estado', '=', false)->get();
        return view('empleados.index_disable', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido_paterno = $request->apellido_paterno;
        $empleado->apellido_materno = $request->apellido_materno;
        $empleado->correo = $request->correo;
        $empleado->contrato = $request->contrato;
        $empleado->save();

        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(String $codigo)
    {
        $empleado = Empleado::where('codigo', '=', $codigo)->first();
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(String $codigo)
    {
        $empleado = Empleado::where('codigo', '=', $codigo)->first();
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->nombre = $request->nombre;
        $empleado->apellido_paterno = $request->apellido_paterno;
        $empleado->apellido_materno = $request->apellido_materno;
        $empleado->correo = $request->correo;
        $empleado->contrato = $request->contrato;
        $empleado->update();

        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->estado = false;
        $empleado->update();
        return redirect(route('empleados.index'));
    }

    public function activate(Empleado $empleado)
    {
        $empleado->estado = true;
        $empleado->update();
        return redirect(route('empleados.index.disable'));
    }
}
