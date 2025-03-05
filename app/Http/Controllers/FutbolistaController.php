<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFutbolistaRequest;
use App\Models\Futbolista;
use App\Models\Posicione;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FutbolistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $futbolistas = Futbolista::where('id_usuario', Auth::id())->get();
        return view('futbolistas.index', compact('futbolistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posiciones = Posicione::all();
        return view('futbolistas.create', compact('posiciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:futbolistas,nombre',
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer|min:0',
            'nacionalidad' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'posiciones' => 'required|array|min:1',
            'posiciones.*' => 'exists:posiciones,id',
        ]);

        try {
            $imagenPath = $request->file('imagen')->store('img_futbolistas', 'public');

            $futbolista = Futbolista::create([
                'nombre' => $request->nombre,
                'fecha_nac' => $request->fecha_nac,
                'edad' => $request->edad,
                'nacionalidad' => $request->nacionalidad,
                'id_usuario' => Auth::id(),
                'imagen' => basename($imagenPath)
            ]);

            $futbolista->posiciones()->attach($request->posiciones);

            return redirect()->route('futbolistas.index')->with('success', 'Futbolista creado correctamente');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->withErrors(['nombre' => 'El nombre ya está en uso.'])->withInput();
            }
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Futbolista $futbolista)
    {
        return response()->json($futbolista);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $futbolista = Futbolista::with('posiciones')->findOrFail($id);
        $posiciones = Posicione::all();
        return view('futbolistas.edit', compact('futbolista', 'posiciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('futbolistas', 'nombre')->ignore($id),
            ],
            'fecha_nac' => 'required|date',
            'edad' => 'required|integer|min:0',
            'nacionalidad' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'posiciones' => 'required|array|min:1',
            'posiciones.*' => 'exists:posiciones,id',
        ]);

        try {
            $futbolista = Futbolista::findOrFail($id);
            $futbolista->update($request->except('posiciones'));
            $futbolista->posiciones()->sync($request->posiciones);

            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('img_futbolistas', 'public');
                $futbolista->update(['imagen' => basename($imagenPath)]);
            }

            return redirect()->route('futbolistas.index')->with('success', 'Futbolista actualizado correctamente.');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->withErrors(['nombre' => 'El nombre ya está en uso.'])->withInput();
            }
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Futbolista $futbolista)
    {
        if ($futbolista->id_usuario !== Auth::id()) {
            return redirect()->route('futbolistas.index')->with('error', 'No tienes permiso para eliminar este futbolista.');
        }

        $futbolista->delete();

        return redirect()->route('futbolistas.index')->with('success', 'Futbolista eliminado exitosamente');
    }
}
