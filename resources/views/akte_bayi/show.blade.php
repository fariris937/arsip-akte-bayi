@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Akte Bayi</h1>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <p>{{ $akteBayi->nama }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Daftar</label>
                <p>{{ $akteBayi->tanggal_daftar->format('d/m/Y') }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Bulan</label>
                <p>{{ $akteBayi->bulan ? date('F', mktime(0, 0, 0, $akteBayi->bulan, 1)) : '-' }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <p>{{ $akteBayi->tahun ?: '-' }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Daftar File Akte</label>
                @php
                    $files = is_array($akteBayi->file) ? $akteBayi->file : (json_decode($akteBayi->file, true) ?: []);
                @endphp
                @if(count($files) > 0)
                    <p>Jumlah file: {{ count($files) }}</p>
                    <ul class="list-group">
                        @foreach($files as $filePath)
                            <li class="list-group-item">
                                <a href="{{ route('file.serve', ['path' => base64_encode($filePath)]) }}" target="_blank">{{ basename($filePath) }}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Tidak ada file yang diupload.</p>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Kota</label>
                <p>{{ $akteBayi->kota ? $akteBayi->kota->nama : '-' }}</p>
            </div>

            <a href="{{ route('akte-bayi.edit', $akteBayi) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('akte-bayi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
