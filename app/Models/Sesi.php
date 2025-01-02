<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
  use HasFactory;

  protected $fillable = [
    'id_guru',
    'id_mapel',
    'id_kelas',
  ];

  public function kehadiran()
  {
    return $this->hasMany(Kehadiran::class, 'id_sesi');
  }
}
