<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Sesi;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapController extends Controller
{
  public function index(Request $request)
  {
    $guru_id = $request->input('guru');
    $kelas_id = $request->input('kelas');
    $sesi_id = $request->input('sesi');

    // Query Kehadiran dengan relasi
    $rekap = Kehadiran::with(['siswa', 'sesi'])
      ->when($guru_id, function ($query, $guru_id) {
        $query->whereHas('sesi.guru', function ($query) use ($guru_id) {
          $query->where('id', $guru_id);
        });
      })
      ->when($kelas_id, function ($query, $kelas_id) {
        $query->whereHas('sesi.kelas', function ($query) use ($kelas_id) {
          $query->where('id', $kelas_id);
        });
      })
      ->when($sesi_id, function ($query, $sesi_id) {
        $query->where('id_sesi', $sesi_id);
      })
      ->get();

    // Ambil data untuk dropdown filter
    $guru = Guru::all();
    $kelas = Kelas::all();
    $sesi = Sesi::with('guru')->get();

    // Mengirim data ke view
    return view('rekap.index', compact('rekap', 'guru', 'kelas', 'sesi'));
  }
  public function exportPdf(Request $request)
  {
    $guru_id = $request->input('guru');
    $kelas_id = $request->input('kelas');
    $sesi_id = $request->input('sesi');

    // Query Kehadiran dengan relasi untuk PDF
    $rekap = Kehadiran::with(['siswa', 'sesi'])
      ->when($guru_id, function ($query, $guru_id) {
        $query->whereHas('sesi.guru', function ($query) use ($guru_id) {
          $query->where('id', $guru_id);
        });
      })
      ->when($kelas_id, function ($query, $kelas_id) {
        $query->whereHas('sesi.kelas', function ($query) use ($kelas_id) {
          $query->where('id', $kelas_id);
        });
      })
      ->when($sesi_id, function ($query, $sesi_id) {
        $query->where('id_sesi', $sesi_id);
      })
      ->get();

    // Generate PDF
    $pdf = Pdf::loadView('rekap.pdf', compact('rekap'));

    // Return PDF response to browser
    return $pdf->download('rekap-kehadiran.pdf');
  }
}
