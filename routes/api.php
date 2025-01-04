<?php

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tables\Basic;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

Route::post('/return', function (Request $req) {
  // Ambil data mentah dari body
  $rawData = $req->getContent(); // Teks hasil pemindaian QR code
  $scannedData = trim($rawData); // Bersihkan spasi atau karakter kosong

  // Ambil data siswa berdasarkan kondisi tertentu
  $students = Siswa::whereHas('class', function ($query) {
      $query->where('nama', '7A'); // Ganti '7A' sesuai kebutuhan Anda
  })->get();

  // Kirimkan data ke view
  return view('main.absensi', compact('students', 'scannedData'));
});

Route::post('absensi', [Basic::class, 'index'])->name('absensi');
