<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return $categoria->contenidos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nombreContenido' => 'required|string|max:255',
            'informacion' => 'required|string',
            'imagenContenido' => 'nullable|string|max:255',
        ]);

        // Crea el nuevo contenido y lo asocia automáticamente con la categoría.
        $contenido = $categoria->contenidos()->create($request->all());

        return response()->json($contenido, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contenido $contenido)
    {
         return $contenido;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contenido $contenido)
    {
        $request->validate([
            'nombreContenido' => 'required|string|max:255',
            'informacion' => 'required|string',
            'imagenContenido' => 'nullable|string|max:255',
            'categoria_id' => 'sometimes|required|exists:categorias,id' // Opcional: permitir cambiar de categoría
        ]);

        // Actualiza el contenido con los nuevos datos.
        $contenido->update($request->all());

        return response()->json($contenido, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contenido $contenido)
    {
        // Elimina el contenido de la base de datos.
        $contenido->delete();

        return response()->json(null, 204);
    }
}
