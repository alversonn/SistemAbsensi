@extends('layouts.contentNavbarLayout')

@section('title', 'Data Guru')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Data Guru</h5>
    <a href="{{ route('guru.create') }}" class="btn btn-primary float-end">Tambah Guru</a>
  </div>
  <div class="card-body">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th>NUPTK</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($guru as $item)
        <tr>
          <td>{{ $item->nuptk }}</td>
          <td>{{ $item->nama }}</td>
          <td>

            <!-- Tombol Edit -->
            <a href="{{ route('guru.edit', $item->id) }}" class="badge bg-label-warning text-decoration-none">
              <i class="bx bx-edit"></i> Edit
            </a>

            <!-- Tombol Hapus -->
            <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display:inline;">
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
