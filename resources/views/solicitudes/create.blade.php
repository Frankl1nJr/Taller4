@extends('layouts.app')

@section('title', 'Crear Solicitud')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Crear Nueva Solicitud</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('solicitudes.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="tema" class="form-label">Tema</label>
                        <input type="text" class="form-control" id="tema" name="tema" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="area" class="form-label">Área</label>
                    <select class="form-select" id="area" name="area" required>
                        <option value="">Seleccione un área</option>
                        <option value="TI">TI</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Contabilidad">Contabilidad</option>
                    </select>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                            <input type="datetime-local" class="form-control" id="fecha_registro" name="fecha_registro" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="fecha_cierre" class="form-label">Fecha de Cierre</label>
                            <input type="datetime-local" class="form-control" id="fecha_cierre" name="fecha_cierre">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" required>
                    </div>

                    <div class="mb-3">
                        <label for="observacion" class="form-label">Observación</label>
                        <input type="text" class="form-control" id="observacion" name="observacion">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="usuarioExt" name="usuarioExt" value="1">
                        <label class="form-check-label" for="usuarioExt">¿Es usuario externo?</label>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar Solicitud</button>
                    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
