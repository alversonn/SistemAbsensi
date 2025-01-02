<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  use HasFactory;

  protected $table = 'siswa';

  protected $fillable = [
    'nisn',
    'nama',
    'status',
  ];

  public function class()
  {
    return $this->belongsTo(kelas::class, 'kelas');
  }

  public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'id_siswa');
    }
}
