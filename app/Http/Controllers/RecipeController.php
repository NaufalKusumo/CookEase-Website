<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage; 

class RecipeController extends Controller
{
    /**
     * Show the form for creating a new recipe.
     */
    public function create()
    {
        // This function just returns the view with the form.
        return view('recipes.create');
    }

    /**
     * Store a newly created recipe in storage.
     */
    public function store(Request $request)
    {
        // 1. VALIDATE THE FORM DATA
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB Max
            'servings' => 'nullable|string|max:50',
            'cook_time' => 'nullable|string|max:50',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
        ]);

        // 2. HANDLE THE FILE UPLOAD
        $imagePath = null;
        if ($request->hasFile('photo')) {
            // Store the image in 'public/recipes' folder and get the path
            $imagePath = $request->file('photo')->store('recipes', 'public');
        }

        // 3. CREATE AND SAVE THE RECIPE
        $recipe = new Recipe();
        $recipe->user_id = Auth::id(); // Get the logged-in user's ID
        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->instructions = $validated['instructions'];
        $recipe->servings = $validated['servings'];
        $recipe->cook_time = $validated['cook_time'];
        $recipe->photo = $imagePath; // Save the path or null
        $recipe->save();
        
        // 4. UPDATE USER ROLE TO 'CREATOR' (as we planned!)
        $user = Auth::user();
        if ($user->role === 'user') {
            $user->role = 'creator';
            $user->save();
        }

        // 5. REDIRECT THE USER
        // For now, let's just redirect to the homepage.
        return redirect('/')->with('success', 'Recipe created successfully!');
    }

    public function show(Recipe $recipe)
    {
        // Thanks to Route Model Binding, Laravel has already found the
        // recipe with the ID from the URL and put it into the $recipe variable.
        // We don't need to write Recipe::find($id) ourselves!

        // Let's also get a few other recipes to show in the sidebar, like in the Figma design.
        // We get recipes that are NOT the current one.
        $otherRecipes = Recipe::where('id', '!=', $recipe->id)->latest()->take(5)->get();

        return view('recipes.show', [
            'recipe' => $recipe,
            'otherRecipes' => $otherRecipes,
        ]);
    }

    public function edit(Recipe $recipe)
    {
        // AUTHORIZATION CHECK
        if (auth()->id() !== $recipe->user_id) {
            abort(403, 'Unauthorized Action');
        }

        return view('recipes.edit', ['recipe' => $recipe]);
    }

    /**
     * Update the specified recipe in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        // AUTHORIZATION CHECK
        if (auth()->id() !== $recipe->user_id) {
            abort(403, 'Unauthorized Action');
        }

        // VALIDATE THE INCOMING DATA (same as your store method)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            // ... all your other validation rules ...
        ]);
        
        // HANDLE FILE UPLOAD (if a new one is provided)
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($recipe->photo) {
                Storage::disk('public')->delete($recipe->photo);
            }
            // Store the new photo
            $validated['photo'] = $request->file('photo')->store('recipes', 'public');
        }

        // UPDATE THE RECIPE with the validated data
        $recipe->update($validated);

        // REDIRECT back to the recipe page with a success message
        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Recipe updated successfully!');
    }


     /**
     * Remove the specified recipe from storage.
     */
    public function destroy(Recipe $recipe)
    {
        // AUTHORIZATION CHECK
        if (auth()->id() !== $recipe->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized Action');
        }

        // DELETE THE PHOTO from storage if it exists
        if ($recipe->photo) {
            Storage::disk('public')->delete($recipe->photo);
        }

        // DELETE THE RECIPE from the database
        $recipe->delete();

        // REDIRECT to the homepage with a success message
        return redirect('/')->with('success', 'Recipe deleted successfully.');
    }

    public function index()
    {
        // Get all recipes, ordered by the newest first, and paginate them.
        // paginate(12) will show 12 recipes per page.
        $recipes = \App\Models\Recipe::latest()->paginate(12);

        // Return a new view and pass the paginated recipes to it.
        return view('recipes.index', ['recipes' => $recipes]);
    }
}


