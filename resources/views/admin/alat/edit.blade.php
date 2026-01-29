@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Alat</h3>

    <form action="{{ route('alat.update', $alat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $alat->nama }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ $alat->jumlah }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $alat->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
