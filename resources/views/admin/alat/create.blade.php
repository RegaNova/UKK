@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Alat</h3>

    <form action="{{ route('alat.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
