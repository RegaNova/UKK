@extends('layouts.app')
@section('title','Peminjaman')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-0">Kelola Peminjaman</h4>
            <p class="text-muted small mb-0">Ajukan dan lihat riwayat peminjaman alat Anda.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i><strong>Terjadi Kesalahan!</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-bottom-0 py-3">
                    <h6 class="fw-bold mb-0"><i class="bi bi-plus-lg me-2"></i>Ajukan Peminjaman Baru</h6>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('user.peminjaman.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="alat_id" class="form-label fw-medium">Nama Alat</label>
                            <select name="alat_id" id="alat_id" class="form-select @error('alat_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Alat --</option>
                                @foreach($alats as $alat)
                                    <option value="{{ $alat->id }}" @selected(old('alat_id') == $alat->id)>
                                        {{ $alat->nama ?? $alat->nama_alat ?? 'Alat #'.$alat->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('alat_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jumlah" class="form-label fw-medium">Jumlah</label>
                            <input name="jumlah" id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', 1) }}" min="1" required>
                            @error('jumlah')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label fw-medium">Tanggal Mulai</label>
                            <input name="tanggal_mulai" id="tanggal_mulai" type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', date('Y-m-d')) }}" required>
                            @error('tanggal_mulai')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label fw-medium">Tanggal Kembali</label>
                            <input name="tanggal_selesai" id="tanggal_selesai" type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai') }}" required>
                            @error('tanggal_selesai')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label fw-medium">Keterangan (Opsional)</label>
                            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan') }}</textarea>
                            <small class="text-muted">Tambahkan keterangan atau alasan peminjaman</small>
                            @error('keterangan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-check-circle me-2"></i>Ajukan Peminjaman
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-bottom-0 py-3">
                    <h6 class="fw-bold mb-0"><i class="bi bi-info-circle me-2"></i>Informasi</h6>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Cara Mengajukan Peminjaman:</h6>
                        <ol class="small mb-0">
                            <li class="mb-2">Pilih alat yang ingin dipinjam dari daftar</li>
                            <li class="mb-2">Tentukan jumlah alat yang dibutuhkan</li>
                            <li class="mb-2">Atur tanggal mulai dan tanggal kembali</li>
                            <li class="mb-2">Tambahkan keterangan jika diperlukan</li>
                            <li class="mb-0">Klik "Ajukan Peminjaman"</li>
                        </ol>
                    </div>
                    <hr>
                    <div>
                        <h6 class="fw-bold mb-2">Status Peminjaman:</h6>
                        <div class="mb-2">
                            <small class="text-muted">
                                <span class="badge bg-warning text-dark"><i class="bi bi-clock"></i> Pending</span>
                                Menunggu persetujuan dari petugas
                            </small>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">
                                <span class="badge bg-success"><i class="bi bi-check"></i> Approved</span>
                                Peminjaman telah disetujui
                            </small>
                        </div>
                        <div>
                            <small class="text-muted">
                                <span class="badge bg-danger"><i class="bi bi-x"></i> Rejected</span>
                                Peminjaman ditolak oleh petugas
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($peminjamans) && $peminjamans->count())
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light border-bottom-0 py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-list me-2"></i>Riwayat Peminjaman Anda</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Alat</th>
                                <th>Jumlah</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamans as $index => $p)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $p->alat->nama ?? $p->alat->nama_alat ?? 'Alat #'.$p->alat_id }}</strong>
                                        @if($p->keterangan)
                                            <br><small class="text-muted">{{ substr($p->keterangan, 0, 50) }}{{ strlen($p->keterangan) > 50 ? '...' : '' }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $p->jumlah }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tanggal_selesai)->format('d/m/Y') }}</td>
                                    <td>
                                            @if($p->status === 'pending')
                                                <span class="badge bg-warning text-dark"><i class="bi bi-clock"></i> Pending</span>
                                            @elseif($p->status === 'approved')
                                                <span class="badge bg-success"><i class="bi bi-check"></i> Approved</span>
                                            @elseif($p->status === 'returned')
                                                <span class="badge bg-primary"><i class="bi bi-arrow-clockwise"></i> Returned</span>
                                            @else
                                                <span class="badge bg-danger"><i class="bi bi-x"></i> Rejected</span>
                                            @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.peminjaman.show', $p->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i><strong>Belum Ada Peminjaman</strong><br>
            Anda belum pernah mengajukan peminjaman. Gunakan form di atas untuk mengajukan peminjaman alat.
        </div>
    @endif
</div>
@endsection