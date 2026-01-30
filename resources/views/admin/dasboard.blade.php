@extends('layouts.app')
@section('title', 'Dashboard Ringkasan')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-0">Ringkasan Sistem</h4>
            <p class="text-muted small mb-0">Pantau data peminjam, petugas, dan inventaris alat.</p>
        </div>
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
            <i class="bi bi-calendar3 me-1"></i> {{ date('d M Y') }}
        </span>
    </div>

    <div class="row g-4">
        
        {{-- Card Peminjam --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Total Peminjam</h6>
                            <h2 class="fw-bold mb-0">120</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-success small fw-medium"><i class="bi bi-arrow-up"></i> 5%</span>
                        <span class="text-muted small ms-1">dari bulan lalu</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Petugas --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Total Petugas</h6>
                            <h2 class="fw-bold mb-0">8</h2>
                        </div>
                        <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                            <i class="bi bi-person-badge fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-muted small">Petugas aktif di lapangan</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Alat --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Total Alat</h6>
                            <h2 class="fw-bold mb-0">45</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                            <i class="bi bi-box-seam fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success-subtle text-success border border-success-subtle">32 Tersedia</span>
                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle ms-1">13 Dipinjam</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection