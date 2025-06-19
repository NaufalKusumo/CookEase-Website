<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Tip;
use App\Models\User;

class BookmarkController extends Controller
{
    public function toggleRecipe(Recipe $recipe)
    {
        Auth::user()->bookmarkedRecipes()->toggle($recipe->id);
        return back()->with('success', 'Recipe bookmark status updated!');
    }

    public function toggleTip(Tip $tip)
    {
        Auth::user()->bookmarkedTips()->toggle($tip->id);
        return back()->with('success', 'Tip bookmark status updated!');
    }

    public function index()
    {
        $user = Auth::user();
        // Get both types of bookmarks
        $recipes = $user->bookmarkedRecipes;
        $tips = $user->bookmarkedTips;

        return view('bookmarks.index', [
            'recipes' => $recipes,
            'tips' => $tips
        ]);
    }
}
