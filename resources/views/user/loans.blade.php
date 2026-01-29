@extends('layouts.app')
@section('title','Peminjaman')

@section('content')
<h4>Form Peminjaman Alat</h4>

<form>
    <div class="mb-3">
        <label>Nama Alat</label>
        <select class="form-select">
            <option>Proyektor</option>
            <option>Kamera</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tanggal Kembali</label>
        <input type="date" class="form-control">
    </div>

    <button class="btn btn-primary">Pinjam</button>
</form>
@endsection