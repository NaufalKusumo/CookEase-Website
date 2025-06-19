<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Tip;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function storeRecipeReport(Request $request, Recipe $recipe) {
        return $this->store($request, $recipe);
    }

    public function storeTipReport(Request $request, Tip $tip) {
        return $this->store($request, $tip);
    }

    private function store(Request $request, $model) {
        $validated = $request->validate([
            'reason' => 'required|string',
            'details' => 'nullable|string',
        ]);

        // Prevent duplicate reports from the same user for the same item
        if ($model->reports()->where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'Anda telah melaporkan konten ini');
        }

        $report = new Report();
        $report->user_id = Auth::id();
        $report->reason = $validated['reason'];
        $report->details = $validated['details'];

        $model->reports()->save($report);

        return back()->with('success', 'Terima Kasih telah melaporkan. Admin akan segera memproses laporan.');
    }
}
