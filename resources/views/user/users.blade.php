@extends('layouts.app')
@section('title', 'Daftar Pengguna')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-0">Daftar Pengguna</h4>
            <p class="text-muted small mb-0">Lihat daftar semua pengguna dalam sistem.</p>
        </div>
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
            <i class="bi bi-people me-1"></i> Total {{ $users->count() }} Pengguna
        </span>
    </div>

    @if($users->isEmpty())
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>Belum ada pengguna terdaftar.
        </div>
    @else
        <div class="row g-4">
            @foreach($users as $user)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">{{ $user->name }}</h6>
                                    <small class="text-muted">{{ ucfirst($user->role) }}</small>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="mb-2">
                                <small class="text-muted d-block">Email</small>
                                <p class="mb-2">{{ $user->email }}</p>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted d-block">Status</small>
                                <span class="badge bg-success">Aktif</span>
                            </div>
                            <small class="text-muted d-block">Terdaftar: {{ $user->created_at->format('d M Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
