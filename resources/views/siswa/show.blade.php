@extends('layouts/contentNavbarLayout')

@section('title', 'Detail Siswa')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Detail Siswa</h5>
  </div>
  <div class="card-body">
    <!-- Tombol Kembali -->
    <a href="{{ route('siswa.index') }}" class="badge bg-label-dark text-decoration-none mb-3">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>

    <!-- Tabel Detail Siswa -->
    <table class="table table-bordered">
      <tr>
        <th>NISN</th>
        <td>{{ $siswa->nisn }}</td>
      </tr>
      <tr>
        <th>Nama</th>
        <td>{{ $siswa->nama }}</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>
          @if($siswa->status == 'Hadir')
          <span class="badge bg-label-success">Hadir</span>
          @elseif($siswa->status == 'Alpha')
          <span class="badge bg-label-danger">Alpha</span>
          @endif
        </td>
      </tr>
    </table>

    <!-- Tombol Edit -->
    <div class="mt-3">
      <a href="{{ route('siswa.edit', $siswa->id) }}" class="badge bg-label-warning text-decoration-none">
        <i class="bx bx-edit"></i> Edit
      </a>

      <!-- Tombol Hapus -->
      <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="badge bg-label-danger border-0" onclick="return confirm('Yakin ingin menghapus?')">
          <i class="bx bx-trash"></i> Hapus
        </button>
      </form>
    </div>
  </div>
  @endsection
