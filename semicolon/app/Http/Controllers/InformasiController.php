<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counseling;

class InformasiController extends Controller
{
    public function index()
    {
        $konsul = Counseling::all();
        return view('informasi.index', ['counseling' => $konsul]);
    }
}
