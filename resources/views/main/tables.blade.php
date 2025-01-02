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
    <!-- Basic Bootstrap Table -->
    <div class="card">
        {{-- <h5 class="card-header">Table Basic</h5> --}}

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Tabel Siswa</h5>
            <div class="d-flex align-items-center">
                <div id="exportButtons"></div>
            </div>
        </div>


        <div class="table-responsive text-nowrap p-2">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->nisn }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <span class="badge bg-label-success me-1">
                                    {{ $student->status ?? 'Hadir' }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
@endsection
