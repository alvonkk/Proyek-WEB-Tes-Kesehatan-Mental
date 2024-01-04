<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Counseling;

class CounselingController extends Controller
{
    public function index()
    {
        return view('counseling.index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        Counseling::create([
            'user_id' => $user->id,
            'tanggal' => $request->konsul,
            'deskripsi' => $request->deskripsi,
            'status' => 'Belum'
        ]);

        return redirect('dashboard');
    }

    public function update(Request $request)
    {
        $counseling = Counseling::findOrFail($request->id);
        $counseling->update([
            'selesai' => $request->selesai,
            'status' => $request->status
        ]);

        return redirect('informasi');
    }
}
