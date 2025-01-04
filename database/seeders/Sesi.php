<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sesi extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('sesi')->insert([
      [
        'id_guru' => 1,
        'id_mapel' => 1,
        'id_kelas' => 1,
        'jam_mulai' => '10.30',
        'jam_selesai' => '12.00',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'id_guru' => 1,
        'id_mapel' => 2,
        'id_kelas' => 2,
        'jam_mulai' => '10.30',
        'jam_selesai' => '12.00',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'id_guru' => 1,
        'id_mapel' => 2,
        'id_kelas' => 3,
        'jam_mulai' => '10.30',
        'jam_selesai' => '12.00',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'id_guru' => 1,
        'id_mapel' => 3,
        'id_kelas' => 3,
        'jam_mulai' => '10.30',
        'jam_selesai' => '12.00',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'id_guru' => 1,
        'id_mapel' => 4,
        'id_kelas' => 3,
        'jam_mulai' => '10.30',
        'jam_selesai' => '12.00',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
