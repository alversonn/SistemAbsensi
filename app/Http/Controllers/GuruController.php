<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $guru = Guru::all(); // Mengambil semua data guru
    return view('guru.index', compact('guru')); // Mengirim data ke view
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('guru.create'); // Menampilkan form tambah guru
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'nuptk' => 'required|unique:guru,nuptk|max:10',
      'nama' => 'required|string|max:255',
    ]);

    Guru::create($request->all()); // Menyimpan data guru

    return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Guru $guru)
  {
    return view('guru.show', compact('guru')); // Menampilkan detail guru
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Guru $guru)
  {
    return view('guru.edit', compact('guru')); // Menampilkan form edit guru
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Guru $guru)
  {
    $request->validate([
      'nuptk' => 'required|max:10|unique:guru,nuptk,' . $guru->id,
      'nama' => 'required|string|max:255',
    ]);

    $guru->update($request->all()); // Mengupdate data guru

    return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Guru $guru)
  {
    $guru->delete(); // Menghapus data guru

    return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
  }
}
