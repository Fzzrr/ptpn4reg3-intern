<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade; // atau model yang merepresentasikan tabel grade
use App\Models\Unit; // Model untuk unit jika diperlukan
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function create()
    {
        // Mengambil semua data grade
        $grades = Grade::all();
        $units = Unit::all();

        // Mengirim data user dan grades ke view
        $user = auth()->user();
        return view('buyform', compact('user', 'grades', 'units'));
    }

        // Method lain sesuai kebutuhan Anda...
    public function buy()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('buy', ['user' => $user]);
    }
}
