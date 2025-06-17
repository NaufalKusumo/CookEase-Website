<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip;
use App\Http\Controllers\Controller;
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
            $bestRecipes = Recipe::latest()->take(4)->get(); // We'll deal with this "best" later
            $newTips = Tip::latest()->take(4)->get(); // <-- TO GET THE TIPS

            return view('welcome', [
                'newRecipes' => $newRecipes,
                'bestRecipes' => $bestRecipes,
                'newTips' => $newTips, // <-- TO SEND THE TIPS TO THE VIEW
            ]);
        }
    }

    /**
     * Show search results for recipes and tips.
     */
    public function search(Request $request)
    {
        // 1. Get the search query from the URL. 'q' is a common name for a query parameter.
        $query = $request->input('q');

        // 2. Handle the case where the user searches for nothing.
        if (!$query) {
            // If there's no query, just return the view with empty results.
            return view('search-results', [
                'query' => $query,
                'recipes' => collect(), // An empty collection
                'tips' => collect(), // An empty collection
            ]);
        }

        // 3. Perform the search on both models.
        // The '%' is a wildcard: find any title that CONTAINS the query.
        $recipes = Recipe::where('title', 'LIKE', "%{$query}%")
                        ->latest()
                        ->get();
                        
        $tips = Tip::where('title', 'LIKE', "%{$query}%")
                ->latest()
                ->get();

        // 4. Return the results view with all the data we found.
        return view('search-results', [
            'query' => $query,
            'recipes' => $recipes,
            'tips' => $tips,
        ]);
    }
}
