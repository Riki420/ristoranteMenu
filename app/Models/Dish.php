<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
      // Aggiungi i campi che possono essere assegnati in modo massivo
      protected $fillable = [
        'name',          // Aggiungi 'name'
        'price',         // Aggiungi 'price'
        'description',   // Aggiungi 'description'
        'category_id',   // Aggiungi 'category_id'
        'image',         // Aggiungi 'image' se desideri che sia mass-assegnabile
        'is_visible',
        'is_vegan',         
        'is_gluten_free',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
