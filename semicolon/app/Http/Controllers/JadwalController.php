<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', ['jadwal' => $jadwal]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jadwal' => 'required'
        ]);

        Jadwal::create([
            'jadwal' => $request->jadwal,
        ]);

        return redirect('jadwal');
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $validate = $request->validate([
            'jadwal' => 'required'
        ]);

        $jadwal->update([
            'jadwal' => $request->jadwal,
        ]);

        return redirect('jadwal');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect('jadwal');
    }
}
