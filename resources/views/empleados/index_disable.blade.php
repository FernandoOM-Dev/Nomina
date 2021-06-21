<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Empleados desactivados
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
                            <form action="{{ route('empleados.activate', $empleado->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Activar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
