<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear empleado
        </h2>
    </x-slot>
    <div class="container mt-5 bg-white rounded shadow p-1">
        <form class="m-3" method="POST" action="{{ route('empleados.store') }}">
            @csrf
            <div class="row">
                <div class="col mb-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col mb-4">
                    <label for="paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}">
                    @error('apellido_paterno')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col mb-4">
                    <label for="materno" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="materno" name="apellido_materno" value="{{ old('apellido_materno') }}">
                    @error('apellido_materno')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo"  name="correo" value="{{ old('correo') }}">
                    @error('correo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col mb-3">
                    @php
                        $contracts = [
                            'indefinido',
                            'definido',
                            'prueba'
                        ]
                    @endphp
                    <label for="contrato" class="form-label">Tipo de contrato</label>
                    <select id="contrato" class="form-select" name="contrato">
                        @foreach ($contracts as $contract)
                            <option value="{{ $contract }}" @if ($contract === old('contrato')) selected @endif>{{ $contract }}</option>
                        @endforeach
                    </select>
                    @error('contrato')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</x-app-layout>
