<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counseling;

class DashboardController extends Controller
{
    public function index()
    {

        // Fetch data from the database
        $counselings = Counseling::all();

        // Calculate counts
        $selesaiCount = $counselings->where('status', 'Selesai')->count();
        $belumCount = $counselings->where('status', 'Belum')->count();

        return view('dashboard.index', compact('selesaiCount', 'belumCount'));
    }
}
