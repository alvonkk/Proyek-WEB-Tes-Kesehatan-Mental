<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AspekPenilaian;
use App\Models\StressLevel;

class StressLevelController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $count = StressLevel::where('user_id', $user->id)->count();

        $aspek_penilain = AspekPenilaian::all();

        return view('stress-level.index', ['aspek_penilaian' => $aspek_penilain, 'row' => $count ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Get all input data from the request
        $inputData = $request->all();

        // Filter the input data based on the key pattern
        $filteredData = array_filter($inputData, function ($key) {
            return preg_match('/^jawaban\d+$/', $key);
        }, ARRAY_FILTER_USE_KEY);

        // Create the result array
        $result = [];

        foreach ($filteredData as $key => $jawaban) {
            $aspek_penilaian_id = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
            $result[] = [
                'aspek_penilaian_id' => $aspek_penilaian_id+1,
                'jawaban' => $jawaban,
                'user_id' => $user->id, // Assuming you are getting the user ID from authentication
            ];
        }


        StressLevel::insert($result);

        return redirect('dashboard');
    }

    public function destroy($id)
    {
        StressLevel::where('user_id', $id)->delete();

        return redirect('stress-level');
    }
}
