<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'showHomePage']);


Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route to SHOW the form to create a recipe
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    
    // Route to HANDLE the form submission and SAVE the recipe
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    
});

// ADD THIS NEW ROUTE!
// It uses "a" wildcard {recipe} to accept any recipe ID.
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

require __DIR__.'/auth.php';
