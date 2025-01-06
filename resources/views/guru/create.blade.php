@extends('layouts.contentNavbarLayout')

@section('title', 'Tambah Guru')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Tambah Guru</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('guru.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nuptk" class="form-label">NIP</label>
        <input type="text" class="form-control" id="nuptk" name="nuptk" required>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
