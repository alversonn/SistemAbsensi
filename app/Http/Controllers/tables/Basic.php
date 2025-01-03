<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class Basic extends Controller
{
  public function index(Request $request)
  {
    // Mengambil data dari FormData
    $scannedData = $request->input('scannedData');

    // Query untuk mendapatkan siswa yang kelasnya bernama '7A'
    $students = Siswa::whereHas('class', function ($query) {
      $query->where('nama', '7A');
    })->get();

    // Mengembalikan view dengan data students dan scannedData
    return view('main.absensi', compact('students', 'scannedData'));
  }
}
