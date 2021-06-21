<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información de empleado
        </h2>
    </x-slot>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $empleado->nombre.' '.$empleado->apellido_paterno.' '.$empleado->apellido_materno }}</h5>
                <p class="card-text">
                    {{ $empleado->codigo }}
                </p>
                <p class="card-text">
                    {{ $empleado->correo }}
                </p>
                <p class="card-text">
                    {{ $empleado->contrato }}
                </p>
                <a href="{{ route('empleados.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>
