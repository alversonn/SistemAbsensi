<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\AttendanceStudent;
use App\Models\TeacherSchedule;
use App\Models\ClassSubject;
use Illuminate\Http\Request;

class TeacherAttendanceController extends Controller
{
    // 1. Scan QR code untuk memulai sesi
    public function scanQr(Request $request)
    {
        $teacherId = $request->teacher_id; // id guru dari sesi login
        $classId = $request->class_id;     // diambil dari QR code yang discan
        $subjectId = $request->subject_id; // diambil dari jadwal guru
        $date = now()->toDateString();     // tanggal hari ini

        // Validasi apakah guru mengajar mata pelajaran di kelas ini hari ini
        $schedule = TeacherSchedule::where('teacher_id', $teacherId)
            ->where('class_id', $classId)
            ->where('subject_id', $subjectId)
            ->whereDate('date', $date)
            ->first();

        if (!$schedule) {
            return response()->json(['error' => 'Anda tidak dijadwalkan untuk mengajar di kelas ini.'], 403);
        }

        // Membuat sesi absensi untuk hari ini
        $attendanceRecord = AttendanceRecord::create([
            'teacher_id' => $teacherId,
            'class_id' => $classId,
            'subject_id' => $subjectId,
            'date' => $date,
            'start_time' => now(),
        ]);

        return response()->json([
            'message' => 'Sesi absensi dimulai!',
            'attendance_record' => $attendanceRecord
        ]);
    }

    // 2. Rekap absensi per sesi (untuk satu guru dalam satu kelas pada satu waktu)
    public function rekapAttendance($sessionId)
    {
        // Mengambil data absensi sesi tertentu
        $attendanceRecord = AttendanceRecord::with('teacher', 'class', 'subject')->find($sessionId);

        // Menghitung jumlah siswa yang hadir dan absen
        $totalPresent = AttendanceStudent::where('attendance_record_id', $sessionId)
                                         ->where('status', 'present')
                                         ->count();

        $totalAbsent = AttendanceStudent::where('attendance_record_id', $sessionId)
                                        ->where('status', 'absent')
                                        ->count();

        // Mendapatkan daftar siswa yang hadir
        $studentsPresent = AttendanceStudent::where('attendance_record_id', $sessionId)
                                            ->where('status', 'present')
                                            ->with('student')  // Mengambil informasi detail siswa
                                            ->get();

        // Menghasilkan rekap absensi dengan daftar siswa hadir
        return response()->json([
            "teacher" => $attendanceRecord->teacher->name,
            "class" => $attendanceRecord->class->name,
            "subject" => $attendanceRecord->subject->name,
            "date" => $attendanceRecord->date,
            "total_present" => $totalPresent,
            "total_absent" => $totalAbsent,
            "students_present" => $studentsPresent->map(function ($record) {
                return $record->student->name;
            })
        ]);
    }

    // 3. Checkout sesi setelah pelajaran selesai
    public function checkoutSession($sessionId)
    {
        $attendanceRecord = AttendanceRecord::find($sessionId);

        if (!$attendanceRecord) {
            return response()->json(['error' => 'Sesi absensi tidak ditemukan.'], 404);
        }

        $attendanceRecord->end_time = now();
        $attendanceRecord->save();

        return response()->json([
            'message' => 'Sesi absensi selesai.',
            'attendance_record' => $attendanceRecord
        ]);
    }

    // 4. Melakukan absensi siswa (manual oleh guru)
    public function markAttendance(Request $request)
    {
        $sessionId = $request->attendance_record_id;
        $studentId = $request->student_id;
        $status = $request->status; // present or absent

        // Cek apakah sesi valid
        $attendanceRecord = AttendanceRecord::find($sessionId);
        if (!$attendanceRecord) {
            return response()->json(['error' => 'Sesi absensi tidak ditemukan.'], 404);
        }

        // Simpan status kehadiran siswa
        AttendanceStudent::updateOrCreate(
            ['attendance_record_id' => $sessionId, 'student_id' => $studentId],
            ['status' => $status]
        );

        return response()->json(['message' => 'Absensi siswa berhasil ditandai!']);
    }

    // 5. Rekap absensi berdasarkan hari, minggu, atau bulan
    public function rekapPerGuru(Request $request)
    {
        $teacherId = $request->teacher_id;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Mengambil data absensi untuk rentang waktu
        $attendanceRecords = AttendanceRecord::where('teacher_id', $teacherId)
            ->whereBetween('date', [$startDate, $endDate])
            ->with(['class', 'subject'])
            ->get();

        $rekap = $attendanceRecords->map(function ($record) {
            $totalPresent = AttendanceStudent::where('attendance_record_id', $record->id)
                                             ->where('status', 'present')
                                             ->count();

            $totalAbsent = AttendanceStudent::where('attendance_record_id', $record->id)
                                            ->where('status', 'absent')
                                            ->count();

            return [
                "class" => $record->class->name,
                "subject" => $record->subject->name,
                "date" => $record->date,
                "total_present" => $totalPresent,
                "total_absent" => $totalAbsent
            ];
        });

        return response()->json(['rekap' => $rekap]);
    }
}
