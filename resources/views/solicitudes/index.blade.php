@extends('layouts.app')

@section('title', 'Listado de Solicitudes')

@section('content')
    <div class="container mt-4">
        <h2>Listado de Solicitudes</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary mb-3">Crear Nueva Solicitud</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Tema</th>
        <th>Descripción</th>
        <th>Área</th>
        <th>Fecha Registro</th>
        <th>Fecha Cierre</th>
        <th>Estado</th>
        <th>Observación</th>
        <th>Usuario Externo</th>
        <th>Acciones</th> {{-- NUEVO --}}
    </tr>
</thead>
<tbody>
    @forelse ($solicitudes as $solicitud)
        <tr>
            <td>{{ $solicitud->id }}</td>
            <td>{{ $solicitud->tema }}</td>
            <td>{{ $solicitud->descripcion }}</td>
            <td>{{ $solicitud->area }}</td>
            <td>{{ $solicitud->fecha_registro }}</td>
            <td>{{ $solicitud->fecha_cierre }}</td>
            <td>{{ $solicitud->estado }}</td>
            <td>{{ $solicitud->observacion }}</td>
            <td>{{ $solicitud->usuarioExt ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="10">No hay solicitudes registradas.</td>
        </tr>
    @endforelse
</tbody>

        </table>
    </div>
@endsection
