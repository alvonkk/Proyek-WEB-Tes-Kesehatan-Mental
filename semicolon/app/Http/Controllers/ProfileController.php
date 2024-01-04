<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StressLevel;
use App\Models\User;
use App\Models\Counseling;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $result = StressLevel::join('aspek_penilaian', 'aspek_penilaian.id', '=', 'stress_level.aspek_penilaian_id')
        ->where('stress_level.user_id', '=', $user->id)
        ->groupBy('aspek_penilaian.kelompok')
        ->select('aspek_penilaian.kelompok', \DB::raw('SUM(stress_level.jawaban) as total'))
        ->get();

        $konsul = Counseling::where('status','Selesai')->get();

        return view('profile.index', ['stress_level' => $result, 'counseling' => $konsul]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect('profile');
    }
}
