@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah Siswa')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Tambah Siswa Baru</h5>
  </div>
  <div class="card-body">
    <!-- Tombol Kembali -->
    <a href="{{ route('siswa.index') }}" class="badge bg-label-dark text-decoration-none mb-3">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>

    <!-- Form Tambah Siswa -->
    <form action="{{ route('siswa.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nisn" class="form-label">NISN</label>
        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
        @error('nisn')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        @error('nama')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
          <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
          <option value="Alpha" {{ old('status') == 'Alpha' ? 'selected' : '' }}>Alpha</option>
        </select>
        @error('status')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="kelas">Kelas</label>
        <input type="text" name="kelas" id="kelas" class="form-control" required>
      </div>
      <button type="submit" style="margin-top: 10px; margin-bottom: 20px;" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection
