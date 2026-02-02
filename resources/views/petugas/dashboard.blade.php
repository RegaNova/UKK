@extends('layouts.app')
@section('title', 'Dashboard Petugas')

@section('content')
<div class="container-fluid px-3 px-md-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Dashboard Petugas</h4>
            <p class="text-muted small mb-0">
                Kelola persetujuan peminjaman alat
            </p>
        </div>

        <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
            <i class="bi bi-calendar3 me-1"></i>
            {{ now()->format('d M Y') }}
        </span>
    </div>

    <!-- STATISTIC CARDS -->
    <div class="row g-4">

        <!-- MENUNGGU PERSETUJUAN -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-uppercase text-muted fw-semibold">
                                Menunggu Persetujuan
                            </small>
                            <h2 class="fw-bold mt-1 mb-0">
                                {{ $totalPending }}
                            </h2>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning p-3 rounded-circle">
                            <i class="bi bi-clock-history fs-4"></i>
                        </span>
                    </div>

                    <a href="{{ route('petugas.peminjaman') }}"
                       class="d-inline-flex align-items-center gap-1 text-warning small fw-medium mt-3 text-decoration-none">
                        Lihat detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- TELAH DISETUJUI -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-uppercase text-muted fw-semibold">
                                Telah Disetujui
                            </small>
                            <h2 class="fw-bold mt-1 mb-0">
                                {{ $totalApproved }}
                            </h2>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success p-3 rounded-circle">
                            <i class="bi bi-check-circle fs-4"></i>
                        </span>
                    </div>

                    <span class="text-success small fw-medium d-block mt-3">
                        <i class="bi bi-check me-1"></i>
                        Sudah diproses
                    </span>
                </div>
            </div>
        </div>

        <!-- DITOLAK -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-uppercase text-muted fw-semibold">
                                Ditolak
                            </small>
                            <h2 class="fw-bold mt-1 mb-0">
                                {{ $totalRejected }}
                            </h2>
                        </div>
                        <span class="badge bg-danger bg-opacity-10 text-danger p-3 rounded-circle">
                            <i class="bi bi-x-circle fs-4"></i>
                        </span>
                    </div>

                    <span class="text-danger small fw-medium d-block mt-3">
                        <i class="bi bi-x me-1"></i>
                        Tidak disetujui
                    </span>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
