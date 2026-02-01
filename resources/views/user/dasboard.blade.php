@extends('layouts.app')
@section('title', 'Dashboard User')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-0">Halo, {{ auth()->user()->name }} 👋</h4>
            <p class="text-muted small mb-0">Kelola peminjaman alat dengan mudah.</p>
        </div>
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
            <i class="bi bi-calendar3 me-1"></i> {{ date('d M Y') }}
        </span>
    </div>

    <div class="row g-4">
        
        {{-- Card Peminjaman Aktif --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Peminjaman Aktif</h6>
                            <h2 class="fw-bold mb-0">{{ $activeLoans ?? 0 }}</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                            <i class="bi bi-box-seam fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('user.peminjaman') }}" class="text-primary small fw-medium text-decoration-none">
                            Lihat detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Peminjaman Pending --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Menunggu Persetujuan</h6>
                            <h2 class="fw-bold mb-0">{{ $pendingLoans ?? 0 }}</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                            <i class="bi bi-clock-history fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-warning small fw-medium"><i class="bi bi-exclamation-circle"></i> Dalam proses</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Total Peminjaman --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Total Peminjaman</h6>
                            <h2 class="fw-bold mb-0">{{ $totalLoans ?? 0 }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                            <i class="bi bi-check-circle fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success-subtle text-success border border-success-subtle">{{ $approvedLoans ?? 0 }} Disetujui</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4 mt-2">
        {{-- Card Ajukan Peminjaman --}}
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-dark fw-bold mb-2">Ajukan Peminjaman Baru</h6>
                            <p class="text-muted small mb-0">Pilih alat yang ingin kamu pinjam.</p>
                        </div>
                        <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                            <i class="bi bi-plus-lg fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('user.peminjaman.create') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus me-1"></i> Ajukan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Daftar Pengguna --}}
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-dark fw-bold mb-2">Daftar Pengguna</h6>
                            <p class="text-muted small mb-0">Lihat daftar pengguna sistem.</p>
                        </div>
                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-3 p-3">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('user.users') }}" class="btn btn-sm btn-secondary">
                            <i class="bi bi-people me-1"></i> Lihat Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection