<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $fillable = [
      'nama'
    ];

    public function students()
    {
        return $this->hasMany(Siswa::class, 'kelas');
    }
}
