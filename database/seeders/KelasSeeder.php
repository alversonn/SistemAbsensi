<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('kelas')->insert([
      [
        'nama' => '7A',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => '7B',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => '7C',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => '7D',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
