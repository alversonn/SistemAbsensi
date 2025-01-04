<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('guru')->insert([
      [
        'nuptk' => '1',
        'nama' => 'Asep',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nuptk' => '2',
        'nama' => 'Nana',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nuptk' => '3',
        'nama' => 'Hermana',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nuptk' => '4',
        'nama' => 'Jack',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nuptk' => '5',
        'nama' => 'Melani',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
