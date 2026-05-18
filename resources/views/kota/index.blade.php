@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Kota</h1>

    <div class="mb-4">
        <a href="{{ route('akte-bayi.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('kota.create') }}" class="btn btn-primary">Tambah Kota</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kotas as $kota)
                    <tr>
                        <td>{{ $kota->id }}</td>
                        <td>{{ $kota->nama }}</td>
                        <td>
                            <a href="{{ route('kota.show', $kota) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('kota.edit', $kota) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('kota.destroy', $kota) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kota ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data kota.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
