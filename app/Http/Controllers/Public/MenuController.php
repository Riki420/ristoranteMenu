<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        // Recupera tutte le categorie, senza filtrare per 'is_visible'
        $categories = Category::all();
        return view('menu.index', compact('categories'));
    }

    public function showByCategory(Category $category)
    {
        // Carica solo i piatti visibili per la categoria
        $category->load(['dishes' => function ($query) {
            $query->where('is_visible', true); // Filtra solo i piatti visibili
        }]);

        return view('menu.category', compact('category'));
    }
}
