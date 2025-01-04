<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
  public function run()
  {
    DB::table('siswa')->insert([
      [
        'nisn' => 1,
        'nama' => 'Tegar Ganteng',
        'kelas' => 1, // Pastikan ID kelas ada di tabel 'kelas'
        'status' => 'Hadir',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nisn' => 2,
        'nama' => 'Alif',
        'kelas' => 1, // Pastikan ID kelas ada di tabel 'kelas'
        'status' => 'Alpha',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nisn' => 3,
        'nama' => 'Nirmala',
        'kelas' => 1, // Pastikan ID kelas ada di tabel 'kelas'
        'status' => 'Alpha',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nisn' => 4,
        'nama' => 'Bani',
        'kelas' => 1, // Pastikan ID kelas ada di tabel 'kelas'
        'status' => 'Alpha',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nisn' => 5,
        'nama' => 'Rizal',
        'kelas' => 2, // Pastikan ID kelas ada di tabel 'kelas'
        'status' => 'Alpha',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
