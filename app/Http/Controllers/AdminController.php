<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;


class AdminController extends Controller
{
    public function reportsIndex()
    {
        $reports = Report::where('status', 'pending')->latest()->get();
        return view('admin.reports.index', ['reports' => $reports]);
    }
        /**
     * Mark a report as resolved.
     */
    public function resolveReport(Report $report)
    {
        // Update the status of the specific report
        $report->status = 'Telah Ditanggapi';
        $report->save();

        // Redirect the admin back to the reports list with a success message
        return back()->with('success', 'Laporan telah ditanggapi.');
    }
}
