<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
  use HasFactory;

  // Menentukan nama tabel yang benar
  protected $table = 'sesi'; // pastikan nama tabel di database adalah 'sesi'


  protected $fillable = [
    'id_guru',
    'id_mapel',
    'id_kelas',
  ];

  public function kehadiran()
  {
    return $this->hasMany(Kehadiran::class, 'id_sesi');
  }

  // Relasi dengan Guru
  public function guru()
  {
    return $this->belongsTo(Guru::class, 'id_guru'); // 'guru_id' adalah nama kolom yang menghubungkan ke tabel guru
  }

  // Relasi dengan Kelas
  public function kelas()
  {
    return $this->belongsTo(Kelas::class, 'id_kelas');
  }
}
