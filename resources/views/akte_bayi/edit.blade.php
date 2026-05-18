@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Akte Bayi</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('akte-bayi.update', $akteBayi) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama', $akteBayi->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu (Opsional)</label>
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                            name="nama_ibu" value="{{ old('nama_ibu', $akteBayi->nama_ibu) }}"
                            placeholder="Masukkan nama lengkap ibu">
                        @error('nama_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                        <input type="date" class="form-control @error('tanggal_daftar') is-invalid @enderror"
                            id="tanggal_daftar" name="tanggal_daftar"
                            value="{{ old('tanggal_daftar', $akteBayi->tanggal_daftar ? $akteBayi->tanggal_daftar->format('Y-m-d') : '') }}"
                            required>
                        @error('tanggal_daftar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan">
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ old('bulan', $akteBayi->bulan) == $i ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                        @error('bulan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                            name="tahun" value="{{ old('tahun', $akteBayi->tahun) }}" min="1900" max="{{ date('Y') + 10 }}">
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Akte (PDF atau JPG) - Bisa upload lebih dari 1
                            file</label>
                        @if($akteBayi->file && is_array($akteBayi->file))
                            <div class="mb-2">
                                <strong>File yang sudah ada:</strong>
                                <!-- @foreach($akteBayi->file as $filePath)
                                    <div><a href="{{ route('file.serve', ['path' => base64_encode($filePath)]) }}" target="_blank">{{ basename($filePath) }}</a>
                                    </div>
                                @endforeach -->
                                @php
    $files = is_array($akteBayi->file)
        ? $akteBayi->file
        : json_decode($akteBayi->file, true);
@endphp

@if (!empty($files))
    @foreach ($files as $filePath)

        @if (!empty($filePath) && $filePath !== false)

            <a href="{{ route('file.serve', [
                    'path' => base64_encode($filePath)
                ]) }}"
               target="_blank">
                Lihat File
            </a>

        @endif

    @endforeach
@endif
                            </div>
                        @elseif($akteBayi->file)
                            <div class="mb-2">
                                <strong>File yang sudah ada:</strong>
                                <div><a href="{{ route('file.serve', ['path' => base64_encode($akteBayi->file)]) }}"
                                        target="_blank">{{ basename($akteBayi->file) }}</a></div>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('file.*') is-invalid @enderror" id="file"
                            name="file[]" accept=".pdf,.jpg,.jpeg" multiple>
                        <small class="form-text text-muted">Upload file baru jika ingin mengganti atau menambah file. (Maks.
                            10MB per file)</small>
                        @error('file.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('akte-bayi.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection