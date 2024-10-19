<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qr_code', // Jika menggunakan QR code untuk kelas
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'class_teacher');
    }

    public function attendanceRecords()
    {
        return $this->hasMany(QrAttendanceRecord::class);
    }
}
