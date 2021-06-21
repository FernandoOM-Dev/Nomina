<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    private $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepository)
    {
        $this->empleadoRepository = $empleadoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = $this->empleadoRepository->getActivateEmployees();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_disable()
    {
        $empleados = $this->empleadoRepository->getDisableEmployees();
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
        $this->empleadoRepository->save($empleado, $request);

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
        $empleado = $this->empleadoRepository->getEmployeeByCode($codigo);
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
        $empleado = $this->empleadoRepository->getEmployeeByCode($codigo);
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
        $this->empleadoRepository->update($empleado, $request);

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
        $this->empleadoRepository->desactivate($empleado);
        return redirect(route('empleados.index'));
    }

    public function activate(Empleado $empleado)
    {
        $this->empleadoRepository->activate($empleado);
        return redirect(route('empleados.index.disable'));
    }
}
