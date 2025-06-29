<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('productos.index', compact('categorias'));
    }

    public function filtrar(Request $request)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categorias,id_categoria'
        ]);

        $productos = Producto::where('id_categoria', $request->id_categoria)->get();
        $categorias = Categoria::all();
        
        return view('productos.index', compact('productos', 'categorias'));
    }

    public function crear()
    {
        $categorias = Categoria::all();
        return view('productos.crear', compact('categorias'));
    }

    public function guardar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categorias,id_categoria'
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente');
    }
}