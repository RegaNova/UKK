@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold mb-0">Data Alat</h4>
                <a href="{{ route('alat.create') }}" class="btn btn-primary rounded-pill">
                    + Tambah
                </a>
            </div>

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alat as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('alat.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning rounded-pill px-3">
                                    Edit
                                </a>

                                <form action="{{ route('alat.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger rounded-pill px-3"
                                        onclick="return confirm('Hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection