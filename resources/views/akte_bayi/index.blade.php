@extends('layouts.app')

@section('content')
    <div class="container fade-in">
        <div class="d-flex justify-content-between align-items-center mb-5 mt-4">
            <div class="d-flex align-items-center">
                <!-- <img src="{{ asset('storage/image/logowates.png') }}" alt="Logo" class="me-3"
                                style="height: 60px; width: auto;"> -->
                <h1 class="mb-0">Dashboard Arsip Akte Bayi</h1>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('akte-bayi.create-folder') }}" class="btn btn-outline-primary shadow-sm">
                    <i class="fas fa-folder-plus me-2"></i>Tambah per Folder
                </a>
                <a href="{{ route('akte-bayi.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus me-2"></i>Tambah Akte Bayi
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Dashboard Cards -->
        <div class="row mb-5 g-4">
            <div class="col-md-4">
                <div class="card stat-card bg-primary h-100">
                    <div class="card-body">
                        <div>
                            <p class="card-text mb-1 opacity-75">Total Akte Bayi</p>
                            <h2 class="mb-0">{{ $totalAkte }}</h2>
                        </div>
                        <div class="icon-wrapper">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-success h-100">
                    <div class="card-body">
                        <div>
                            <p class="card-text mb-1 opacity-75">Akte Bayi Bulan Ini</p>
                            <h2 class="mb-0">{{ $akteBulanIni }}</h2>
                        </div>
                        <div class="icon-wrapper">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-info h-100">
                    <div class="card-body">
                        <div>
                            <p class="card-text mb-1 opacity-75">Akte Bayi Tahun Ini</p>
                            <h2 class="mb-0">{{ $akteTahunIni }}</h2>
                        </div>
                        <div class="icon-wrapper">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <!-- Search and Recent Records Section -->
            <div class="col-lg-12">
                <div class="card mb-4 border-0 shadow-sm" style="background: rgba(102, 126, 234, 0.05);">
                    <div class="card-body py-4">
                        <form method="GET" action="{{ route('akte-bayi.index') }}" class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label small fw-bold text-muted mb-1">Cari Nama</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                    <input type="text" name="search" class="form-control border-start-0"
                                        placeholder="Nama bayi..." value="{{ request('search') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted mb-1">Bulan</label>
                                <select name="month" class="form-select">
                                    <option value="">Semua Bulan</option>
                                    @php
                                        $months = [
                                            1 => 'Januari',
                                            2 => 'Februari',
                                            3 => 'Maret',
                                            4 => 'April',
                                            5 => 'Mei',
                                            6 => 'Juni',
                                            7 => 'Juli',
                                            8 => 'Agustus',
                                            9 => 'September',
                                            10 => 'Oktober',
                                            11 => 'November',
                                            12 => 'Desember'
                                        ];
                                    @endphp
                                    @foreach($months as $num => $name)
                                        <option value="{{ $num }}" {{ request('month') == $num ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label small fw-bold text-muted mb-1">Tahun</label>
                                <select name="year" class="form-select">
                                    <option value="">Semua</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = 2020;
                                    @endphp
                                    @for($y = $currentYear; $y >= $startYear; $y--)
                                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end gap-2">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                                @if (request('search') || request('month') || request('year'))
                                    <a href="{{ route('akte-bayi.index') }}" class="btn btn-light border" title="Reset">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock text-primary me-2"></i>
                            <h5 class="mb-0">Daftar Akte Bayi Terbaru</h5>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th class="ps-4">Nama Bayi</th>
                                        <th>Nama Ibu</th>
                                        <th>Kota</th>
                                        <th>Tanggal Daftar</th>
                                        <th>File</th>
                                        <th class="text-end pe-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($akteBayis as $akteBayi)
                                        <tr>
                                            <td class="ps-4">
                                                <div class="fw-bold">{{ $akteBayi->nama }}</div>
                                                <small class="text-muted">No. {{ ($akteBayis->currentPage() - 1) * $akteBayis->perPage() + $loop->iteration }}</small>
                                            </td>
                                            <td>{{ $akteBayi->nama_ibu ?? '-' }}</td>
                                            <td>
                                                <span class="badge bg-light text-dark fw-normal border">
                                                    {{ $akteBayi->kota ? $akteBayi->kota->nama : '-' }}
                                                </span>
                                            </td>
                                            <td>{{ $akteBayi->tanggal_daftar->format('d/m/Y') }}</td>
                                            <td>
                                                @if ($akteBayi->file && is_array($akteBayi->file))
                                                    @foreach ($akteBayi->file as $index => $filePath)
                                                        <a href="{{ route('file.serve', ['path' => base64_encode($filePath)]) }}" target="_blank"
                                                            class="text-decoration-none me-1" title="{{ basename($filePath) }}">
                                                            <i class="fas fa-file-pdf text-danger fa-lg"></i>
                                                        </a>
                                                    @endforeach
                                                @elseif($akteBayi->file)
                                                    <a href="{{ route('file.serve', ['path' => base64_encode($akteBayi->file)]) }}" target="_blank"
                                                        class="text-decoration-none">
                                                        <i class="fas fa-file-pdf text-danger fa-lg"></i>
                                                    </a>
                                                @else
                                                    <span class="text-muted small">Tanpa File</span>
                                                @endif
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="btn-group">
                                                    <a href="{{ route('akte-bayi.show', $akteBayi) }}"
                                                        class="btn btn-sm btn-light border-0" title="Lihat Detail">
                                                        <i class="fas fa-eye text-info"></i>
                                                    </a>
                                                    <a href="{{ route('akte-bayi.edit', $akteBayi) }}"
                                                        class="btn btn-sm btn-light border-0" title="Edit">
                                                        <i class="fas fa-edit text-warning"></i>
                                                    </a>
                                                    <form action="{{ route('akte-bayi.destroy', $akteBayi) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light border-0"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus akte bayi ini?')"
                                                            title="Hapus">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-5">
                                                <i class="fas fa-folder-open fa-3x mb-3 opacity-25"></i>
                                                <p class="mb-0">Belum ada data akte bayi.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($akteBayis->hasPages())
                        <div class="card-footer bg-white border-top py-3 d-flex justify-content-center">
                            {{ $akteBayis->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection