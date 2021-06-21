<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Empleados
        </h2>
    </x-slot>
    <div class="container mt-5 bg-white rounded shadow">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->codigo }}</td>
                        <td>{{ $empleado->nombre.' '.$empleado->apellido_paterno.' '.$empleado->apellido_materno }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>
                            <a href="{{ route('empleados.show', $empleado->codigo) }}">
                                <button type="button" class="btn btn-primary">Ver más</button>
                            </a>
                            <a href="{{ route('empleados.edit', $empleado->codigo) }}">
                                <button type="button" class="btn btn-warning">Editar</button>
                            </a>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
