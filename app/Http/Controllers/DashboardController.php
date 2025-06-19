<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get the user's recipes and tips using the relationships you already defined
        $myRecipes = $user->recipes()->latest()->get();
        $myTips = $user->tips()->latest()->get();

        return view('dashboard', [
            'user' => $user,
            'recipes' => $myRecipes,
            'tips' => $myTips,
        ]);
    }
}
