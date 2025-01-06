@extends('layouts/contentNavbarLayout')

@section('title', 'Tabel Siswa')

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif


<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-title mb-0">Tabel Siswa </h5>
    <div class="d-flex justify-content-end">
      <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>NISN</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($siswa as $item)
        <tr>
          <td>{{ $item->nisn ?? 'NISN kosong' }}</td>
          <td>{{ $item->nama ?? 'Nama kosong' }}</td>
          <td>
            @if($item->status == 'Hadir')
            <span class="badge bg-label-success">Hadir</span>
            @elseif($item->status == 'Alpha')
            <span class="badge bg-label-danger">Alpha</span>
            @endif
          </td>
          <td>
            <!-- Tombol Show -->
            <a href="{{ route('siswa.show', $item->id) }}" class="badge bg-label-primary text-decoration-none">
              <i class="bx bx-show"></i> Lihat
            </a>

            <!-- Tombol Edit -->
            <a href="{{ route('siswa.edit', $item->id) }}" class="badge bg-label-warning text-decoration-none">
              <i class="bx bx-edit"></i> Edit
            </a>

            <!-- Tombol Hapus -->
            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="badge bg-label-danger text-red border-0" onclick="return confirm('Yakin ingin menghapus?')">
                <i class="bx bx-trash"></i> Hapus
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>



    </table>
  </div>
</div>
@endsection
