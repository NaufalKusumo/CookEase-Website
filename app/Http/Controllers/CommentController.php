<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip; 
use App\Models\Recipe; 
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    // This method handles comments for RECIPES
    public function storeRecipeComment(Request $request, Recipe $recipe)
    {
        return $this->store($request, $recipe);
    }

    // This method handles comments for TIPS
    public function storeTipComment(Request $request, Tip $tip)
    {
        return $this->store($request, $tip);
    }

    private function store(Request $request, $model)
    {
        $user = Auth::user();

        // GATE 1: Check for ownership.
        // We check if the model (Recipe or Tip) has a 'user_id' property.
        // If it does, we check if it matches the current user's ID.
        if ($model->user_id === $user->id) {
            // Redirect back with an error message.
            return back()->with('error', 'You cannot review your own content.');
        }

        // GATE 2: Check for existing reviews by this user on this specific model.
        // We query the comments relationship on the model.
        $existingComment = $model->comments()->where('user_id', $user->id)->first();

        if ($existingComment) {
            // Redirect back with an error message.
            return back()->with('error', 'You have already submitted a review for this item.');
        }

        // --- If the request passes both gates, proceed as normal ---

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'body' => 'nullable|string',
        ]);

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->rating = $validated['rating'];
        $comment->body = $validated['body'];

        $model->comments()->save($comment);

        return back()->with('success', 'Thank you for your review!');
    }
}