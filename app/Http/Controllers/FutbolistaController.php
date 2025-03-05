<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFutbolistaRequest;
use App\Models\Futbolista;
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
        // Devolver vista para crear un futbolista (si es necesario una vista en lugar de API)
        return view('futbolistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer',
            'nacionalidad' => 'required|string|max:100',
            'imagen' => 'required|image|max:255',
        ]);

        try {
            $futbolista = new Futbolista();
            $futbolista->nombre = $request->nombre;
            $futbolista->fecha_nac = $request->fecha_nac;
            $futbolista->edad = $request->edad;
            $futbolista->nacionalidad = $request->nacionalidad;
            $futbolista->id_usuario = Auth::id();

            $nombreImagen = time() . "-" . $request->file('imagen')->getClientOriginalName();
            $futbolista->imagen = $nombreImagen;

            $futbolista->save();

            $request->file('imagen')->storeAs('img_futbolistas', $nombreImagen);

            // Redirigir a la ruta futbolistas.index después de añadir el futbolista
            return redirect()->route('futbolistas.index')->with('success', 'Futbolista añadido correctamente');
        } catch (QueryException $e) {
            return response()->json(['msg' => 'Error al añadir futbolista. Inténtalo más tarde'], 500);
        }
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
    public function update(UpdateFutbolistaRequest $request, Futbolista $futbolista)
    {
        // Verificar que el usuario autenticado es dueño del futbolista
        if ($futbolista->id_usuario !== Auth::id()) {
            return redirect()->route('futbolistas.index')->with('error', 'No tienes permiso para editar este futbolista.');
        }

        try {
            // Actualizar datos del futbolista
            $futbolista->nombre = $request->nombre;
            $futbolista->fecha_nac = $request->fecha_nac;
            $futbolista->edad = $request->edad;
            $futbolista->nacionalidad = $request->nacionalidad;

            // Si el usuario sube una nueva imagen, actualizarla
            if ($request->hasFile('imagen')) {
                $nombreImagen = time() . "-" . $request->file('imagen')->getClientOriginalName();
                $request->file('imagen')->storeAs('img_futbolistas', $nombreImagen);
                $futbolista->imagen = $nombreImagen;
            }

            $futbolista->save();

            return redirect()->route('futbolistas.index')->with('success', 'Futbolista actualizado correctamente.');
        } catch (QueryException $e) {
            return back()->with('error', 'Error al actualizar el futbolista. Inténtalo más tarde.');
        }
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
