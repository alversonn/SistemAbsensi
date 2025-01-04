<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Mapel extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('mapel')->insert([
      [
        'nama' => 'Bahasa Inggris',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Bahasa Indonesia',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Matematika',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Sejarah',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Olahraga',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
