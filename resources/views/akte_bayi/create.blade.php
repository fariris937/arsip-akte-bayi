@extends('layouts.app')

@section('content')
    <div class="container fade-in py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('akte-bayi.index') }}" class="btn btn-light rounded-circle me-3 border shadow-sm"
                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-arrow-left text-primary"></i>
                    </a>
                    <h1 class="mb-0">Tambah Akte Bayi Baru</h1>
                </div>

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('akte-bayi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="nama" class="form-label fw-bold">Nama Bayi</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user text-muted"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 @error('nama') is-invalid @enderror" id="nama"
                                        name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap bayi"
                                        required>
                                </div>
                                @error('nama')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="nama_ibu" class="form-label fw-bold">Nama Ibu (Opsional)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user-female text-muted"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 @error('nama_ibu') is-invalid @enderror"
                                        id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}"
                                        placeholder="Masukkan nama lengkap ibu">
                                </div>
                                @error('nama_ibu')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label for="tanggal_daftar" class="form-label fw-bold">Tanggal Daftar</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-calendar-alt text-muted"></i>
                                        </span>
                                        <input type="date"
                                            class="form-control border-start-0 @error('tanggal_daftar') is-invalid @enderror"
                                            id="tanggal_daftar" name="tanggal_daftar" value="{{ old('tanggal_daftar') }}"
                                            required>
                                    </div>
                                    @error('tanggal_daftar')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="bulan" class="form-label fw-bold">Bulan (Opsional)</label>
                                    <select class="form-select @error('bulan') is-invalid @enderror" id="bulan"
                                        name="bulan">
                                        <option value="">Pilih Bulan</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ old('bulan') == $i ? 'selected' : '' }}>
                                                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('bulan')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tahun" class="form-label fw-bold">Tahun (Opsional)</label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                                        id="tahun" name="tahun" value="{{ old('tahun') }}" min="1900"
                                        max="{{ date('Y') + 10 }}" placeholder="{{ date('Y') }}">
                                    @error('tahun')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="file" class="form-label fw-bold">Upload File Akte (PDF/JPG)</label>
                                <div class="p-3 border-2 border-dashed rounded-3 text-center bg-light mb-2">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3 opacity-50"></i>
                                    <input type="file" class="form-control @error('file.*') is-invalid @enderror" id="file"
                                        name="file[]" accept=".pdf,.jpg,.jpeg" multiple>
                                    <small class="text-muted d-block mt-2">Bisa upload lebih dari 1 file (Maks. 10MB per
                                        file)</small>
                                </div>
                                @error('file.*')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3 border-top">
                                <a href="{{ route('akte-bayi.index') }}" class="btn btn-light px-4 py-2 me-md-2">Batal</a>
                                <button type="submit" class="btn btn-primary px-5 py-2">
                                    <i class="fas fa-save me-2"></i>Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection