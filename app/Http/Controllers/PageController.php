<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class PageController extends Controller
{
    public function showHomePage()
    {
        // Check if a user is logged in AND their role is 'creator'
        if (auth()->check() && auth()->user()->role === 'creator') {
            
            // --- CREATOR'S VIEW ---
            // Get only the recipes created by this specific user
            $myRecipes = Recipe::where('user_id', auth()->id())
                            ->latest()
                            ->get();

            return view('welcome', [
                'newRecipes' => $myRecipes, // Send their recipes to the view
                'bestRecipes' => collect(), // Send an empty collection for now
            ]);

        } else {

            // --- GUEST OR REGULAR USER'S VIEW ---
            // Get the general recipes for everyone else
            $newRecipes = Recipe::latest()->take(4)->get();
            $bestRecipes = Recipe::latest()->take(4)->get(); 

            return view('welcome', [
                'newRecipes' => $newRecipes,
                'bestRecipes' => $bestRecipes,
            ]);
        }
    }
}
