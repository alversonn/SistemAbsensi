<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran; // Pastikan ini diimpor dengan benar
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
  public function store(Request $request)
  {
    $attendanceData = $request->input('attendance');

    foreach ($attendanceData as $studentId => $status) {
      Kehadiran::updateOrCreate(
        ['student_id' => $studentId], // Kondisi pencarian
        ['status' => $status]         // Data yang diperbarui atau dibuat
      );
    }

    return redirect()->back()->with('success', 'Attendance has been saved.');
  }
}
