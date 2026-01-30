@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container pt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">Edit Kategori</h4>
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary rounded-pill">
                    Kembali
                </a>
            </div>

            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label fw-medium">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" id="nama" name="nama" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           value="{{ old('nama', $kategori->nama) }}" 
                           placeholder="Masukkan nama kategori" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-medium">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              placeholder="Masukkan deskripsi kategori">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        Update
                    </button>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary rounded-pill px-4">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

