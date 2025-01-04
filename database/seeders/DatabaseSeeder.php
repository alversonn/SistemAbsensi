<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    $this->call([
      KelasSeeder::class, // Seeder untuk tabel 'kelas' dijalankan pertama
      KelasSeeder::class,
      GuruSeeder::class,  // Seeder untuk tabel 'guru' dijalankan terakhir
      Mapel::class,
      SiswaSeeder::class, // Seeder untuk tabel 'siswa' dijalankan kedua
      Sesi::class,
    ]);

    User::factory()->create([
      'name' => 'Test User',
      'email' => 'test@example.com',
    ]);
  }
}
