@extends('layouts.contentNavbarLayout')

@section('title', 'Rekap Kehadiran')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Rekap Kehadiran</h5>
    <form method="GET" action="{{ route('rekap.index') }}" id="filterForm">
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="kelas" class="form-label">Kelas</label>
          <select name="kelas" id="kelas" class="form-select" onchange="document.getElementById('filterForm').submit()">
            <option value="">-- Pilih Kelas --</option>
            @foreach($kelas as $k)
            <option value="{{ $k->id }}" {{ request('kelas') == $k->id ? 'selected' : '' }}>
              {{ $k->nama }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <label for="guru" class="form-label">Guru</label>
          <select name="guru" id="guru" class="form-select" onchange="document.getElementById('filterForm').submit()">
            <option value="">-- Pilih Guru --</option>
            @foreach($guru as $g)
            <option value="{{ $g->id }}" {{ request('guru') == $g->id ? 'selected' : '' }}>
              {{ $g->nama }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <label for="sesi" class="form-label">Sesi</label>
          <select name="sesi" id="sesi" class="form-select" onchange="document.getElementById('filterForm').submit()">
            <option value="">-- Pilih Sesi --</option>
            @foreach($sesi as $s)
            <option value="{{ $s->id }}" {{ request('sesi') == $s->id ? 'selected' : '' }}>
              {{ $s->nama }}
            </option>
            @endforeach
          </select>
        </div>
      </div>
    </form>
    <!-- Tombol Export PDF -->
    <div>
      <a href="{{ route('rekap.export', request()->all()) }}" class="btn btn-danger mt-2">
        Export PDF
      </a>
    </div>
  </div>

  <div class="card-body">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th>NISN</th>
          <th>Nama</th>
          <th>Status</th>
          <!-- <th>Tanggal</th> -->
        </tr>
      </thead>
      <tbody>
        @foreach($rekap as $data)
        <tr>
          <!-- Periksa apakah relasi siswa ada sebelum mengaksesnya -->
          <td>{{ $data->siswa ? $data->siswa->nisn : 'N/A' }}</td>
          <td>{{ $data->siswa ? $data->siswa->nama : 'N/A' }}</td>
          <!-- <td>{{ $data->status }}</td> -->
          <td>
            @if($data->status == 'Hadir')
            <span class="badge bg-label-success">Hadir</span>
            @elseif($data->status == 'Alpha')
            <span class="badge bg-label-danger">Alpha</span>
            @endif
          </td>
          <!-- <td>{{ $data->created_at ? $data->created_at->format('Y-m-d') : 'Tidak Tersedia' }}</td> -->
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
