@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kota</h1>
    <form action="{{ route('kota.update', $kota) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kota</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kota->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
