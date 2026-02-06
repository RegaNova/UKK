@extends('layouts.app')
@section('title','Daftar Alat')

@section('content')
<div class="container-fluid px-3 px-md-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Daftar Alat</h4>
        <p class="text-muted small mb-0">
            Lihat daftar lengkap alat yang tersedia untuk dipinjam
        </p>
    </div>

    @if($alat->count())
        <div class="row g-4">
            @foreach($alat as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <!-- Gambar Alat -->
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        @if($item->gambar && file_exists(public_path('images/' . $item->gambar)))
                            <img src="{{ asset('images/' . $item->gambar) }}"
                                 alt="{{ $item->nama }}"
                                 class="img-fluid"
                                 style="max-height: 100%; object-fit: cover;">
                        @else
                            <div class="text-center text-muted">
                                <i class="bi bi-image fs-1"></i>
                                <p class="small">Tidak ada gambar</p>
                            </div>
                        @endif
                    </div>

                    <!-- Info Alat -->
                    <div class="card-body p-3">
                        <h6 class="fw-bold mb-2">{{ $item->nama }}</h6>

                        <div class="mb-3">
                            <small class="text-muted d-block">
                                <i class="bi bi-tag me-1"></i>
                                {{ $item->kategori->nama ?? 'Kategori tidak ada' }}
                            </small>
                            <small class="text-muted d-block">
                                <i class="bi bi-box-seam me-1"></i>
                                Stok: <strong>{{ $item->jumlah }}</strong>
                            </small>
                        </div>

                        @if($item->keterangan)
                            <p class="text-muted small mb-3" style="max-height: 80px; overflow: hidden;">
                                {{ Str::limit($item->keterangan, 60) }}
                            </p>
                        @endif

                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary flex-grow-1 btn-alat-detail"
                                    data-id="{{ $item->id }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#alatDetailModal">
                                <i class="bi bi-eye me-1"></i> Detail
                            </button>
                            <a href="{{ route('user.peminjaman.create') }}"
                               class="btn btn-sm btn-outline-success"
                               title="Ajukan peminjaman">
                                <i class="bi bi-plus-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Tidak ada alat tersedia saat ini.
        </div>
    @endif

</div>

<!-- Modal Detail Alat -->
<div class="modal fade" id="alatDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Alat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img id="detail-gambar" src="" alt="Gambar" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                </div>
                <dl class="row">
                    <dt class="col-sm-4">Nama</dt><dd class="col-sm-8" id="detail-nama"></dd>
                    <dt class="col-sm-4">Kategori</dt><dd class="col-sm-8" id="detail-kategori"></dd>
                    <dt class="col-sm-4">Stok</dt><dd class="col-sm-8" id="detail-stok"></dd>
                    <dt class="col-sm-4">Keterangan</dt><dd class="col-sm-8" id="detail-keterangan" style="max-height: 150px; overflow-y: auto;"></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus me-1"></i> Ajukan Peminjaman
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const detailButtons = document.querySelectorAll('.btn-alat-detail');
    const alatList = @json($alat);

    detailButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const alat = alatList.find(a => a.id == id);

            if (alat) {
                document.getElementById('detail-nama').textContent = alat.nama;
                document.getElementById('detail-kategori').textContent = alat.kategori ? alat.kategori.nama : 'Kategori tidak ada';
                document.getElementById('detail-stok').textContent = alat.jumlah;
                document.getElementById('detail-keterangan').textContent = alat.keterangan || 'Tidak ada keterangan';

                if (alat.gambar) {
                    document.getElementById('detail-gambar').src = "{{ asset('images/') }}" + alat.gambar;
                } else {
                    document.getElementById('detail-gambar').src = "";
                }
            }
        });
    });
});
</script>
@endsection
