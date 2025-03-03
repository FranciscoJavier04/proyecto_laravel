<?php

namespace App\Http\Controllers;

use App\Models\Futbolista;
use Illuminate\Http\Request;

class FutbolistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los futbolistas
        $futbolistas = Futbolista::all();
        return response()->json($futbolistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Devolver vista para crear un futbolista (si es necesario una vista en lugar de API)
        return view('futbolistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del futbolista
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer',
            'nacionalidad' => 'required|string|max:100',
            'imagen' => 'required|string|max:255',
            'id_usuario' => 'required|exists:users,id',
        ]);

        // Crear el futbolista
        $futbolista = Futbolista::create([
            'nombre' => $validated['nombre'],
            'fecha_nac' => $validated['fecha_nac'],
            'edad' => $validated['edad'],
            'nacionalidad' => $validated['nacionalidad'],
            'imagen' => $validated['imagen'],
            'id_usuario' => $validated['id_usuario'],
        ]);

        return response()->json($futbolista, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Futbolista $futbolista)
    {
        // Mostrar un futbolista específico
        return response()->json($futbolista);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Futbolista $futbolista)
    {
        // Devolver vista para editar un futbolista (si es necesario una vista en lugar de API)
        return view('futbolistas.edit', compact('futbolista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Futbolista $futbolista)
    {
        // Validar los datos del futbolista
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer',
            'nacionalidad' => 'required|string|max:100',
            'imagen' => 'required|string|max:255',
            'id_usuario' => 'required|exists:users,id',
        ]);

        // Actualizar el futbolista
        $futbolista->update([
            'nombre' => $validated['nombre'],
            'fecha_nac' => $validated['fecha_nac'],
            'edad' => $validated['edad'],
            'nacionalidad' => $validated['nacionalidad'],
            'imagen' => $validated['imagen'],
            'id_usuario' => $validated['id_usuario'],
        ]);

        return response()->json($futbolista);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Futbolista $futbolista)
    {
        // Eliminar el futbolista
        $futbolista->delete();

        return response()->json(['message' => 'Futbolista eliminado exitosamente']);
    }
}
