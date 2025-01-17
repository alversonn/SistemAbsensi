<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
  use HasFactory;

  protected $fillable = [
    'id_siswa',
    'id_sesi',
    'status',
    'updated_at',
  ];

  public function siswa()
  {
    return $this->belongsTo(Siswa::class, 'id_siswa');
  }

  public function sesi()
  {
    return $this->belongsTo(Sesi::class, 'id_sesi');
  }
}
