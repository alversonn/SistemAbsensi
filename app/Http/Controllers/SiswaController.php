<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
  public function index()
  {
    $siswa = Siswa::all(); // Ambil semua data siswa
    // Debug data siswa
    if ($siswa->isEmpty()) {
      return view('content.tables.tables-basic')->with('error', 'Tidak ada data siswa di database.');
    }
    return view('content.tables.tables-basic', compact('siswa'));
  }

  public function create()
  {
    return view('siswa.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nisn' => 'required|unique:siswa,nisn|max:10',
      'nama' => 'required|string|max:255',
      'status' => 'required|in:Alpha,Hadir',
    ]);

    Siswa::create($request->all());

    return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
  }

  public function show(Siswa $siswa)
  {
    return view('siswa.show', compact('siswa'));
  }

  public function edit(Siswa $siswa)
  {
    return view('siswa.edit', compact('siswa'));
  }

  public function update(Request $request, Siswa $siswa)
  {
    $request->validate([
      'nisn' => 'required|max:10|unique:siswa,nisn,' . $siswa->id,
      'nama' => 'required|string|max:255',
      'status' => 'required|in:Alpha,Hadir',
    ]);

    $siswa->update($request->all());

    return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
  }

  public function destroy(Siswa $siswa)
  {
    $siswa->delete();

    return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
  }
}
