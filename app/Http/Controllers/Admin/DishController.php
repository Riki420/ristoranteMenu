<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->get('category_id');
    
        if ($categoryId) {
            $dishes = Dish::whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            })->get();
        } else {
            $dishes = Dish::all();
        }
    
        return view('admin.dishes.index', compact('dishes', 'categories'));
    }

    public function create()
    {
        // Passa tutte le categorie per la selezione del piatto
        $categories = Category::all();
        return view('admin.dishes.create', compact('categories'));
    }

    public function store(Request $request)
{
    // Validazione dei dati
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_ids' => 'required|array',
        'category_ids.*' => 'exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        'is_visible' => 'boolean', // Validazione del campo visibilità
    ]);
    
    // Carica l'immagine (se presente)
    if ($request->hasFile('image')) {
        // Memorizza il file temporaneo nella cartella 'public/dishes'
        $imagePath = $request->file('image')->store('dishes', 'public');
    }

    // Crea il piatto
    $dish = Dish::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imagePath ?? null,  // Salva il percorso dell'immagine
        'is_visible' => $request->has('is_visible'), // Imposta la visibilità
    ]);
    
    // Associa il piatto alle categorie selezionate
    $dish->categories()->attach($request->category_ids);

    return redirect()->route('admin.dishes.index');
}

    public function edit(Dish $dish)
    {
        $dish->load('categories'); // <-- carica anche la relazione
        $categories = Category::all();
        return view('admin.dishes.edit', compact('dish', 'categories'));
    }

    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'is_visible' => 'boolean', // Validazione del campo visibilità
        ]);
    
        if ($request->hasFile('image')) {
            // Se esiste una nuova immagine, caricala
            $imagePath = $request->file('image')->store('dishes', 'public');
            // Elimina l'immagine vecchia se esiste
            if ($dish->image) {
                Storage::delete('public/' . $dish->image);
            }
            $dish->image = $imagePath;
        }
    
        // Aggiorna il piatto
        $dish->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'is_visible' => $request->has('is_visible'), // Gestisce la visibilità
        ]);
    
        $dish->categories()->sync($request->category_ids);
    
        return redirect()->route('admin.dishes.index');
    }

    public function destroy(Dish $dish)
    {
        if ($dish->image) {
            Storage::delete('public/' . $dish->image);
        }
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }

    public function toggleVisibility(Dish $dish)
    {
    // Inverti lo stato di visibilità
    $dish->is_visible = !$dish->is_visible;
    $dish->save();

    return redirect()->route('admin.dishes.index')->with('success', 'Visibilità aggiornata con successo!');
    }
}
