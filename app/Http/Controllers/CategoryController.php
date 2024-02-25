<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::orderBy('id', 'desc')->paginate(3);
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.nueva');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validamos los campos del formulario de crear una nueva categoria
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:categories,nombre'],
            'color' => ['required', 'hex_color'],
        ]);

        //creamos la categoria
        Category::create($request->all());
        return redirect()->route('categories.index')->with('mensaje', 'Categoria Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categorias.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //validamos los campos del formulario de update categoria
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:categories,nombre,' . $category->id],
            'color' => ['required', 'hex_color'],
        ]);

        //modificamos la categoria
        $category->update($request->all());
        return redirect()->route('categories.index')->with('mensaje', 'Categoria Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('mensaje', 'Categoria Borrada');
    }
}
