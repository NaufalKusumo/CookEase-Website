<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\CommentController;

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

    Route::get('/tips/create', [TipController::class, 'create'])->name('tips.create');
    Route::post('/tips', [TipController::class, 'store'])->name('tips.store');

    // Edit the Recipe
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');

    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Edit tips
    Route::get('/tips/{tip}/edit', [TipController::class, 'edit'])->name('tips.edit');
    Route::put('/tips/{tip}', [TipController::class, 'update'])->name('tips.update');
    Route::delete('/tips/{tip}', [TipController::class, 'destroy'])->name('tips.destroy');

    // User can comment
    Route::post('/recipes/{recipe}/comments', [CommentController::class, 'storeRecipeComment'])->name('comments.store.recipe');
    Route::post('/tips/{tip}/comments', [CommentController::class, 'storeTipComment'])->name('comments.store.tip');
    
});

// ADD THIS NEW ROUTE!
// It uses "a" wildcard {recipe} to accept any recipe ID.
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

// The {tip} wildcard will capture the ID from the URL.
Route::get('/tips/{tip}', [TipController::class, 'show'])->name('tips.show');

// ADD THIS NEW ROUTE FOR SEARCH
Route::get('/search', [PageController::class, 'search'])->name('search.index');

require __DIR__.'/auth.php';
