<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tip; // Use the Tip model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipController extends Controller
{
    /**
     * Show the form for creating a new tip.
     */
    public function create()
    {
        return view('tips.create'); // We will create this view next
    }

    /**
     * Store a newly created tip in storage.
     */
    public function store(Request $request)
    {
        // 1. VALIDATE THE FORM
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255', // The short summary
            'content' => 'required|string', // The main content
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB Max
        ]);

        // 2. HANDLE THE FILE UPLOAD
        $imagePath = null;
        if ($request->hasFile('photo')) {
            // Store the image in 'public/tips' folder
            $imagePath = $request->file('photo')->store('tips', 'public');
        }

        // 3. CREATE AND SAVE THE TIP
        $tip = new Tip();
        $tip->user_id = Auth::id();
        $tip->title = $validated['title'];
        $tip->description = $validated['description']; // Save the short description
        $tip->content = $validated['content']; // Save the main content
        $tip->photo = $imagePath;
        $tip->save();
        
        // 4. REDIRECT THE USER
        return redirect('/')->with('success', 'Tip created successfully!');
    }

    public function show(Tip $tip)
    {
        // Laravel's Route Model Binding has already found the tip for us!
        // The $tip variable already contains the tip with the ID from the URL.

        // Get a few other tips for a sidebar, excluding the current one.
        $otherTips = Tip::where('id', '!=', $tip->id)->latest()->take(5)->get();

        return view('tips.show', [
            'tip' => $tip,
            'otherTips' => $otherTips,
        ]);
    }
}
