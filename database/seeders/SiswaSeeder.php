<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
  public function run()
  {
    Siswa::create(['nisn' => '101015', 'nama' => 'Alif Abdul Hakim', 'status' => 'Alpha']);
    Siswa::create(['nisn' => '101016', 'nama' => 'Audrey Naila Putri', 'status' => 'Hadir']);
  }
}
