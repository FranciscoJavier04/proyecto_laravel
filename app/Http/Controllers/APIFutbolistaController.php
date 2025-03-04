<?php

namespace App\Http\Controllers;

use App\Models\Futbolista;
use Illuminate\Http\Request;

class APIFutbolistaController extends Controller
{

    public function index()
    {
        $futbolistas = Futbolista::all();
        return response()->json(['status' => true, 'futbolistas' => $futbolistas, 'msg' => 'Listado de futbolistas'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $futbolista = Futbolista::create($request->all());
        return response()->json(['status' => true, 'futbolista' => $futbolista, 'msg' => 'Futbolista Creado'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $futbolista = Futbolista::find($id);
        return response()->json(['status' => true, 'futbolista' => $futbolista, 'msg' => 'Futbolista Encontrado'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $futbolista = Futbolista::find($id);
        $futbolista->update($request->all());
        return response()->json(['status' => true, 'futbolista' => $futbolista, 'msg' => 'Futbolista Actualizado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $futbolista = Futbolista::find($id);
        $futbolista->delete();
        return response()->json(['status' => true, 'futbolista' => $futbolista, 'msg' => 'Futbolista Eliminado'], 200);
    }
}
