<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\MenuController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Categories Route
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Routes for dishes
    Route::get('dishes', [DishController::class, 'index'])->name('dishes.index');
    Route::get('dishes/create', [DishController::class, 'create'])->name('dishes.create');
    Route::post('dishes', [DishController::class, 'store'])->name('dishes.store');
    Route::get('dishes/{dish}/edit', [DishController::class, 'edit'])->name('dishes.edit');
    Route::put('dishes/{dish}', [DishController::class, 'update'])->name('dishes.update');
    Route::delete('dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');

    // Route per toggle della visibilità
    Route::patch('dishes/{dish}/toggle-visibility', [DishController::class, 'toggleVisibility'])->name('dishes.toggleVisibility');
});


Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/category/{category}', [MenuController::class, 'showByCategory'])->name('menu.category');

require __DIR__.'/auth.php';
