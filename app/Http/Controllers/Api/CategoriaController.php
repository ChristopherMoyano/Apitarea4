<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * @group Categorías
 *
 * APIs para gestionar las categorías.
 */

class CategoriaController extends Controller
{
    /**
     * Listar Categorías
     *
     * Muestra una lista de todas las categorías existentes.
     * * @response scenario="Éxito" [
     * {
     * "id": 1,
     * "nombre": "Accion",
     * "imagen": "path/to/accion.png",
     * "created_at": "2025-06-18T12:00:00.000000Z",
     * "updated_at": "2025-06-18T12:00:00.000000Z"
     * },
     * {
     * "id": 2,
     * "nombre": "Fantasia",
     * "imagen": "path/to/fantasia.png",
     * "created_at": "2025-06-18T12:00:00.000000Z",
     * "updated_at": "2025-06-18T12:00:00.000000Z"
     * }
     * ]
     */
    public function index()
    {
         return Categoria::all();
    }

     /**
     * Crear una Categoría
     *
     * Guarda una nueva categoría en la base de datos.
     *
     * @bodyParam nombre string required El nombre de la categoría. Example: Romance
     * @bodyParam imagen string La URL de la imagen (opcional). Example: path/to/romance.png
     *
     * @response 201 {
     * "id": 3,
     * "nombre": "Romance",
     * "imagen": "path/to/romance.png",
     * "created_at": "2025-06-18T12:01:00.000000Z",
     * "updated_at": "2025-06-18T12:01:00.000000Z"
     * }
     */

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|string|max:255',
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

   /**
     * Mostrar una Categoría
     *
     * Muestra una categoría específica por su ID.
     *
     * @urlParam categoria integer required El ID de la categoría a mostrar. Example: 1
     *
     * @response {
     * "id": 1,
     * "nombre": "Accion",
     * "imagen": "path/to/accion.png",
     * "created_at": "2025-06-18T12:00:00.000000Z",
     * "updated_at": "2025-06-18T12:00:00.000000Z"
     * }
     */
    public function show(Categoria $categoria)
    {
        return $categoria;
    }

     /**
     * Actualizar una Categoría
     *
     * Actualiza los datos de una categoría existente.
     *
     * @urlParam categoria integer required El ID de la categoría a actualizar. Example: 1
     * @bodyParam nombre string required El nuevo nombre para la categoría. Example: Acción y Aventura
     * @bodyParam imagen string El nuevo path para la imagen (opcional).
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|string|max:255',
        ]);

        // Actualiza la categoría con los nuevos datos.
        $categoria->update($request->all());

        // Devuelve la categoría actualizada.
        return response()->json($categoria, 200);
    }

     /**
     * Eliminar una Categoría
     *
     * Elimina una categoría específica de la base de datos.
     *
     * @urlParam categoria integer required El ID de la categoría a eliminar. Example: 2
     *
     * @response 204 scenario="Éxito" No Content.
     */
    public function destroy(Categoria $categoria)
    {
         // Elimina la categoría de la base de datos.
        $categoria->delete();

        // Devuelve una respuesta vacía con un código de estado 204 (Sin Contenido),
        // que indica que la operación fue exitosa.
        return response()->json(null, 204);
    }
}
