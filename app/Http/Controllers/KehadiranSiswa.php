<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KehadiranSiswa extends Controller
{
  //

  public function store(Request $request)
  {
    $absensiData = $request->input('absensi');
    $id_sesi = $request->input('id_sesi');

    foreach ($absensiData as $nisn => $status) {
      Kehadiran::create([
        'id_siswa' => $nisn,
        'id_sesi' => $id_sesi,
        'status' => $status,
      ]);
    }

    return redirect()->back()->with('success', 'Attendance has been saved.');
  }
}
