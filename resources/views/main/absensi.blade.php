@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('page-style')
    @vite('resources/assets/versi 3.1/datatables.min.css')
@endsection

@section('page-script')
    @vite('resources/assets/versi 3.1/datatables.min.js')
    @vite('resources/assets/versi 3.1/main.js')
@endsection

@section('content')
    <form action="{{ route('kehadiran') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Tabel Siswa</h5>
                <div class="d-flex align-items-center">
                    <div id="exportButtons"></div>
                </div>
            </div>


            <div class="table-responsive text-nowrap p-5">
                <input type="hidden" name="id_sesi" value="1">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->nisn }}</td>
                                <td>{{ $student->nama }}</td>
                                <td>
                                    <span class="badge bg-label-success me-1">
                                        {{ $student->status ?? 'Hadir' }}
                                    </span>
                                </td>
                                <td>Tanggal</td>
                                <td>
                                    <div class="form-check">
                                        <input name="absensi[{{ $student->nisn }}]" class="form-check-input" type="checkbox"
                                            value="hadir" id="hadir-{{ $student->nisn }}"
                                            {{ $student->status == 'Hadir' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="hadir-{{ $student->nisn }}">Hadir</label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </form>
    </div>
    </div>
@endsection
