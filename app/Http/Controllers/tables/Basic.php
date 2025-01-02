<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class Basic extends Controller
{
  public function index()
  {

    $students = Siswa::whereHas('class', function ($query) {
      $query->where('nama', '7A');
    })->get();

    return view('main.absensi', compact('students'));
  }
}
