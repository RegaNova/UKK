@props(['role'])
@php
    $activeClass = 'nav-link active d-flex align-items-center gap-2';
    $inactiveClass = 'nav-link text-white-50 d-flex align-items-center gap-2';
@endphp

<aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100" style="width: 280px;">
    
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4 fw-bold">
            <i class="bi bi-tools me-2"></i>PinjamAlat
        </span>
    </a>
    
    <hr>

    <ul class="nav nav-pills flex-column mb-auto gap-1">

        {{-- ADMIN --}}
        @if ($role === 'admin')
            <li class="nav-item">
                <div class="text-uppercase small fw-bold text-white-50 mt-2 mb-1 ms-3" style="font-size: 0.75rem;">
                    Admin
                </div>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="{{ request()->routeIs('admin.dashboard') ? $activeClass : $inactiveClass }}" 
                   aria-current="page">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.petugas') }}" class="{{ request()->routeIs('admin.petugas.*') ? $activeClass : $inactiveClass }}">
                    Kelola Petugas
                </a>
            </li>
            <li>
                <a href="{{ route('admin.peminjam') }}" class="{{ request()->routeIs('admin.peminjam.*') ? $activeClass : $inactiveClass }}">
                    Kelola Peminjam
                </a>
            </li>
            <li>
                <a href="{{ route("alat.index") }}" class="{{ request()->routeIs('alat.*') ? $activeClass : $inactiveClass }}">
                    Data Alat
                </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? $activeClass : $inactiveClass }}">
                    Kategori
                </a>
            </li>
        @endif

        @if ($role === 'petugas')
            <li class="nav-item">
                <div class="text-uppercase small fw-bold text-white-50 mt-2 mb-1 ms-3" style="font-size: 0.75rem;">
                    Petugas
                </div>
            </li>
            <li>
                <a href="{{ route('petugas.dashboard') }}" 
                   class="{{ request()->routeIs('petugas.dashboard') ? $activeClass : $inactiveClass }}">
                    <i class="bi bi-grid"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('petugas.approvals') }}" 
                   class="{{ request()->routeIs('petugas.approvals') ? $activeClass : $inactiveClass }}">
                    <i class="bi bi-check-circle"></i>
                    Persetujuan
                </a>
            </li>
        @endif

        {{-- USER --}}
        @if ($role === 'user')
            <li class="nav-item">
                <div class="text-uppercase small fw-bold text-white-50 mt-2 mb-1 ms-3" style="font-size: 0.75rem;">
                    Peminjam
                </div>
            </li>
            <li>
                <a href="{{ route('user.dashboard') }}" 
                   class="{{ request()->routeIs('user.dashboard') ? $activeClass : $inactiveClass }}">
                    <i class="bi bi-house-door"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('user.alat') }}" 
                   class="{{ request()->routeIs('user.alat') ? $activeClass : $inactiveClass }}">
                    <i class="bi bi-search"></i>
                    Daftar Alat
                </a>
            </li>
            <li>
                <a href="{{ route('user.peminjaman') }}" 
                   class="{{ request()->routeIs('user.peminjaman') ? $activeClass : $inactiveClass }}">
                    <i class="bi bi-cart3"></i>
                    Peminjaman
                </a>
            </li>
        @endif

    </ul>

</aside>