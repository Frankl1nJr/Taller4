<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    // Listar todas las solicitudes
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    // Mostrar formulario para crear nueva solicitud
    public function create()
    {
        return view('solicitudes.create');
    }

    // Guardar una nueva solicitud en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date',
            'estado' => 'required|string|max:255',
            'observacion' => 'nullable|string|max:255',
            'usuarioExt' => 'nullable|boolean',
        ]);

        $data = $request->all();
        // Checkbox booleano
        $data['usuarioExt'] = $request->has('usuarioExt');

        Solicitud::create($data);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada correctamente.');
    }

    // Mostrar una solicitud específica (opcional)
    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.show', compact('solicitud'));
    }

    // Mostrar formulario para editar solicitud existente
    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.edit', compact('solicitud'));
    }

    // Actualizar solicitud en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date',
            'estado' => 'required|string|max:255',
            'observacion' => 'nullable|string|max:255',
            'usuarioExt' => 'nullable|boolean',
        ]);

        $solicitud = Solicitud::findOrFail($id);

        $data = $request->all();
        $data['usuarioExt'] = $request->has('usuarioExt');

        $solicitud->update($data);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente.');
    }

    // Eliminar solicitud
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada correctamente.');
    }
}
