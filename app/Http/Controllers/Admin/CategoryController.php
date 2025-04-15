<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // Mostra tutte le categorie
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Mostra il form per creare una nuova categoria
    public function create()
    {
        return view('admin.categories.create');
    }

    // Salva una nuova categoria
    public function store(Request $request)
    {
        // Valida i dati
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crea la categoria
        Category::create([
            'name' => $request->name,
        ]);

        // Redirige con un messaggio di successo
        return redirect()->route('admin.categories.index')->with('success', 'Categoria aggiunta con successo!');
    }

    // Mostra il form per modificare una categoria
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Aggiorna una categoria
    public function update(Request $request, Category $category)
    {
        // Valida i dati
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Aggiorna la categoria
        $category->update([
            'name' => $request->name,
        ]);

        // Redirige con un messaggio di successo
        return redirect()->route('admin.categories.index')->with('success', 'Categoria aggiornata con successo!');
    }

    // Elimina una categoria
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categoria eliminata con successo!');
    }
}
