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
        // This function now does the same thing for everyone:
        // Show the 4 newest recipes and 4 newest tips.
        $newRecipes = Recipe::latest()->take(4)->get();
        $newTips = Tip::latest()->take(4)->get();

        return view('welcome', [
            'newRecipes' => $newRecipes,
            //'BestRecipes => $bestRecipes,
            'newTips' => $newTips,
        ]);
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
