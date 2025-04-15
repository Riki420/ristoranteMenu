<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    // Aggiungi i campi che sono "riempiabili" (mass assignment)
    protected $fillable = ['name']; // Aggiungi 'name' alla lista dei campi fillable
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
