@extends('layouts.app')
@section('title', 'Dashboard Petugas')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-0">Dashboard Petugas</h4>
            <p class="text-muted small mb-0">Kelola persetujuan peminjaman alat.</p>
        </div>
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
            <i class="bi bi-calendar3 me-1"></i> {{ date('d M Y') }}
        </span>
    </div>

    <div class="row g-4">
        
        {{-- Card Peminjaman Menunggu Persetujuan --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Menunggu Persetujuan</h6>
                            <h2 class="fw-bold mb-0">{{ $totalPending }}</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                            <i class="bi bi-clock-history fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('petugas.peminjaman') }}" class="text-warning small fw-medium text-decoration-none">
                            Lihat detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Peminjaman Disetujui --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Telah Disetujui</h6>
                            <h2 class="fw-bold mb-0">{{ $totalApproved }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                            <i class="bi bi-check-circle fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-success small fw-medium"><i class="bi bi-check"></i> Sudah diproses</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Peminjaman Ditolak --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Ditolak</h6>
                            <h2 class="fw-bold mb-0">{{ $totalRejected }}</h2>
                        </div>
                        <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3">
                            <i class="bi bi-x-circle fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-danger small fw-medium"><i class="bi bi-x"></i> Tidak disetujui</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
