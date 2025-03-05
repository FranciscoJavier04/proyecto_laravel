<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFutbolistaRequest;
use App\Models\Futbolista;
use App\Models\Posicione;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FutbolistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener los futbolistas del usuario autenticado
        $futbolistas = Futbolista::where('id_usuario', Auth::id())->get();

        // Retornar vista con los futbolistas
        return view('futbolistas.index', compact('futbolistas'));
    }


    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        // Obtener todas las posiciones disponibles
        $posiciones = Posicione::all();

        // Retornar la vista de crear futbolista con las posiciones
        return view('futbolistas.create', compact('posiciones'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer|min:0',
            'nacionalidad' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'posiciones' => 'required|array|min:1', // Validar que se seleccionen posiciones
            'posiciones.*' => 'exists:posiciones,id', // Validar que las posiciones seleccionadas existan en la base de datos
        ]);

        // Subir la imagen y obtener la ruta
        $imagenPath = $request->file('imagen')->store('img_futbolistas', 'public');

        // Crear el futbolista
        $futbolista = Futbolista::create([
            'nombre' => $request->nombre,
            'fecha_nac' => $request->fecha_nac,
            'edad' => $request->edad,
            'nacionalidad' => $request->nacionalidad,
            'id_usuario' => $request->id_usuario,
            'imagen' => basename($imagenPath) // Guardamos solo el nombre de la imagen
        ]);

        // Asignar las posiciones seleccionadas al futbolista
        $futbolista->posiciones()->attach($request->posiciones);

        return redirect()->route('futbolistas.index')->with('success', 'Futbolista creado correctamente');
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


    public function edit($id)
    {
        // Obtener el futbolista con sus posiciones actuales
        $futbolista = Futbolista::with('posiciones')->findOrFail($id);

        // Obtener todas las posiciones disponibles
        $posiciones = Posicione::all();

        return view('futbolistas.edit', compact('futbolista', 'posiciones'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer|min:0',
            'nacionalidad' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'posiciones' => 'required|array|min:1', // Validar que se seleccionen posiciones
            'posiciones.*' => 'exists:posiciones,id', // Validar que las posiciones seleccionadas existan en la base de datos
        ]);

        // Obtener el futbolista
        $futbolista = Futbolista::findOrFail($id);

        // Actualizar el futbolista
        $futbolista->update($request->except('posiciones'));

        // Actualizar las posiciones (relación many-to-many)
        $futbolista->posiciones()->sync($request->posiciones);

        // Si se sube una nueva imagen, manejarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('img_futbolistas', 'public');
            $futbolista->update(['imagen' => basename($imagenPath)]);
        }

        return redirect()->route('futbolistas.index')->with('success', 'Futbolista actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Futbolista $futbolista)
    {
        // Verificar que el futbolista pertenece al usuario autenticado
        if ($futbolista->id_usuario !== Auth::id()) {
            return redirect()->route('futbolistas.index')->with('error', 'No tienes permiso para eliminar este futbolista.');
        }

        // Eliminar el futbolista
        $futbolista->delete();

        return redirect()->route('futbolistas.index')->with('success', 'Futbolista eliminado exitosamente');
    }
}
