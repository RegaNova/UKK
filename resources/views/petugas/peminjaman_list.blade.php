@extends('layouts.app')
@section('title', 'Daftar Peminjaman')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-0">Daftar Pengajuan Peminjaman</h4>
            <p class="text-muted small mb-0">Proses persetujuan peminjaman alat dari pengguna.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($peminjamans->isEmpty())
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>Belum ada pengajuan peminjaman.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Peminjam</th>
                        <th>Alat</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamans as $index => $peminjaman)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <strong>{{ $peminjaman->user->name ?? '-' }}</strong><br>
                                <small class="text-muted">{{ $peminjaman->user->email ?? '-' }}</small>
                            </td>
                            <td>{{ $peminjaman->alat->nama ?? '-' }}</td>
                            <td>{{ $peminjaman->jumlah }}</td>
                            <td>{{ $peminjaman->tanggal_mulai }}</td>
                            <td>{{ $peminjaman->tanggal_selesai }}</td>
                            <td>
                                @if($peminjaman->status === 'pending')
                                    <span class="badge bg-warning text-dark"><i class="bi bi-clock"></i> Pending</span>
                                @elseif($peminjaman->status === 'approved')
                                    <span class="badge bg-success"><i class="bi bi-check"></i> Disetujui</span>
                                @else
                                    <span class="badge bg-danger"><i class="bi bi-x"></i> Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if($peminjaman->status === 'pending')
                                    <div class="btn-group btn-group-sm" role="group">
                                        <form action="{{ route('petugas.peminjaman.approve', $peminjaman->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Setujui peminjaman ini?')">
                                                <i class="bi bi-check"></i> Setujui
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $peminjaman->id }}">
                                            <i class="bi bi-x"></i> Tolak
                                        </button>
                                    </div>

                                    <!-- Reject Modal -->
                                    <div class="modal fade" id="rejectModal{{ $peminjaman->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tolak Peminjaman</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('petugas.peminjaman.reject', $peminjaman->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="alasan" class="form-label">Alasan Penolakan</label>
                                                            <textarea name="alasan" id="alasan" class="form-control" rows="4" required></textarea>
                                                            <small class="text-muted">Jelaskan mengapa peminjaman ini ditolak.</small>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Tolak Peminjaman</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
