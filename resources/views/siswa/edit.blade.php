@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Siswa')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Edit Data Siswa</h5>
  </div>
  <div class="card-body">
    <!-- Tombol Kembali -->
    <a href="{{ route('siswa.index') }}" class="badge bg-label-dark text-decoration-none mb-3">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>

    <!-- Form Edit Siswa -->
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
      @csrf
      @method('PUT') <!-- Method PUT untuk update -->

      <div class="mb-3">
        <label for="nisn" class="form-label">NISN</label>
        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" required>
        @error('nisn')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" required>
        @error('nama')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
          <option value="Hadir" {{ old('status', $siswa->status) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
          <option value="Alpha" {{ old('status', $siswa->status) == 'Alpha' ? 'selected' : '' }}>Alpha</option>
        </select>
        @error('status')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection
