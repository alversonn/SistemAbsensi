<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        // Tambahkan field lain sesuai kebutuhan
    ];

    public function attendanceRecords()
    {
        return $this->hasMany(QrAttendanceRecord::class);
    }
}
  