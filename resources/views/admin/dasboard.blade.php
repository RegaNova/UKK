@extends('layouts.app')
@section('title', 'Dashboard Ringkasan')

@section('content')
{{-- Background abu-abu muda --}}
<div class="container-fluid py-4 min-vh-100" style="background-color: #f4f7f6;">

    {{-- HEADER --}}
    <div class="d-flex align-items-center justify-content-between mb-4 px-2">
        <div>
            <h4 class="fw-bold text-dark mb-0">Ringkasan Sistem</h4>
            <p class="text-muted small mb-0">Pantau data peminjam, petugas, dan inventaris alat.</p>
        </div>
        <div class="d-none d-md-block">
            <span class="badge bg-primary px-3 py-2 shadow-sm rounded-pill">
                <i class="bi bi-calendar3 me-2"></i>{{ date('d M Y') }}
            </span>
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="row g-4">

        {{-- Total Peminjam --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100 border-top border-primary border-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Total Peminjam</h6>
                            <h2 class="fw-bold mb-0">{{ $totalPeminjam }}</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.peminjam') }}" class="text-primary small fw-medium text-decoration-none">
                            Lihat detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Petugas --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100 border-top border-info border-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Total Petugas</h6>
                            <h2 class="fw-bold mb-0">{{ $totalPetugas }}</h2>
                        </div>
                        <div class="bg-info bg-opacity-10 text-info rounded-circle p-3">
                            <i class="bi bi-person-badge fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.petugas') }}" class="text-info small fw-medium text-decoration-none">
                            Kelola petugas <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Alat --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100 border-top border-success border-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-secondary text-uppercase fw-bold small mb-2">Total Alat</h6>
                            <h2 class="fw-bold mb-0">{{ $totalAlat }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">
                            <i class="bi bi-box-seam fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success-subtle text-success border border-success-subtle">{{ $alatTersedia }} Total</span>
                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle ms-1">{{ $peminjamanAktif }} Dipinjam</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE RIWAYAT PEMINJAMAN --}}
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm overflow-hidden">

                {{-- Header Tabel --}}
                <div class="card-header bg-dark py-3 d-flex align-items-center justify-content-between border-0">
                    <h5 class="fw-bold text-white mb-0">Riwayat Peminjaman User</h5>
                    <a href="#" class="btn btn-sm btn-outline-light px-3 rounded-pill">
                        Lihat Semua
                    </a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th class="px-4 py-3 small text-uppercase fw-bold text-muted">No</th>
                                    <th class="py-3 small text-uppercase fw-bold text-muted">Nama User</th>
                                    <th class="py-3 small text-uppercase fw-bold text-muted">Nama Alat</th>
                                    <th class="py-3 small text-uppercase fw-bold text-muted text-center">Tanggal Pinjam</th>
                                    <th class="py-3 small text-uppercase fw-bold text-muted text-center">Tanggal Kembali</th>
                                    <th class="py-3 small text-uppercase fw-bold text-muted text-end px-4">Status</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                <tr>
                                    <td class="px-4 text-muted fw-medium">01</td>
                                    <td class="fw-bold text-dark">Andi Pratama</td>
                                    <td class="text-muted">Bor Listrik</td>
                                    <td class="text-center text-muted">10 Jan 2026</td>
                                    <td class="text-center text-muted">15 Jan 2026</td>
                                    <td class="text-end px-4">
                                        <span class="badge bg-warning-subtle text-warning px-3">
                                            Dipinjam
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-4 text-muted fw-medium">02</td>
                                    <td class="fw-bold text-dark">Siti Aisyah</td>
                                    <td class="text-muted">Vacuum Cleaner</td>
                                    <td class="text-center text-muted">05 Jan 2026</td>
                                    <td class="text-center text-muted">08 Jan 2026</td>
                                    <td class="text-end px-4">
                                        <span class="badge bg-success-subtle text-success px-3">
                                            Dikembalikan
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-4 text-muted fw-medium">03</td>
                                    <td class="fw-bold text-dark">Budi Santoso</td>
                                    <td class="text-muted">Kabel Roll</td>
                                    <td class="text-center text-muted">01 Jan 2026</td>
                                    <td class="text-center text-muted">03 Jan 2026</td>
                                    <td class="text-end px-4">
                                        <span class="badge bg-success-subtle text-success px-3">
                                            Dikembalikan
                                        </span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
