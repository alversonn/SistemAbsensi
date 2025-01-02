@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Guru')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Edit Guru</h5>
  </div>
  <div class="card-body">
    <!-- Tombol Kembali -->
    <a href="{{ route('guru.index') }}" class="badge bg-label-dark text-decoration-none mb-3">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>
    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="nuptk" class="form-label">NUPTK</label>
        <input type="text" class="form-control" id="nuptk" name="nuptk" value="{{ $guru->nuptk }}" required>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection
