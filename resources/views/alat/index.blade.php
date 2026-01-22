@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Alat</h3>

    <a href="{{ route('alat.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @foreach($alat as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>
                <a href="{{ route('alat.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('alat.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
