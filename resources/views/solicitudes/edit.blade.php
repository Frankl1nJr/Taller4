@extends('layouts.app')

@section('title', 'Editar Solicitud')

@section('content')
<div class="container mt-4">
    <h2>Editar Solicitud</h2>

    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tema" class="form-label">Tema</label>
            <input type="text" class="form-control" id="tema" name="tema" value="{{ $solicitud->tema }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $solicitud->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <select class="form-select" id="area" name="area" required>
                <option value="TI" {{ $solicitud->area == 'TI' ? 'selected' : '' }}>TI</option>
                <option value="Administrador" {{ $solicitud->area == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="Contabilidad" {{ $solicitud->area == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="datetime-local" class="form-control" id="fecha_registro" name="fecha_registro" value="{{ \Carbon\Carbon::parse($solicitud->fecha_registro)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_cierre" class="form-label">Fecha de Cierre</label>
            <input type="datetime-local" class="form-control" id="fecha_cierre" name="fecha_cierre" value="{{ $solicitud->fecha_cierre ? \Carbon\Carbon::parse($solicitud->fecha_cierre)->format('Y-m-d\TH:i') : '' }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{ $solicitud->estado }}" required>
        </div>

        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <input type="text" class="form-control" id="observacion" name="observacion" value="{{ $solicitud->observacion }}">
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="usuarioExt" value="0">
            <input type="checkbox" class="form-check-input" id="usuarioExt" name="usuarioExt" value="1" {{ $solicitud->usuarioExt ? 'checked' : '' }}>
            <label class="form-check-label" for="usuarioExt">Usuario Externo</label>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
