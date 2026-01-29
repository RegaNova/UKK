<nav class="navbar navbar-expand navbar-light bg-white border-bottom shadow-sm sticky-top px-4" style="height: 64px;">
    <div class="container-fluid p-0">

        <div class="d-flex align-items-center">
            <h5 class="mb-0 fw-bold text-dark text-truncate" style="max-width: 200px;">
                @yield('page-title', 'Dashboard')
            </h5>
        </div>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-dark px-2 rounded hover-bg-light" 
                   href="#" 
                   id="adminDropdown" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-expanded="false">
                    
                    {{-- Info Nama (Disembunyikan di layar sangat kecil) --}}
                    <div class="text-end d-none d-sm-block me-1">
                        <p class="mb-0 fw-semibold small" style="line-height: 1;">
                            {{ auth()->user()->name }}
                        </p>
                        <small class="text-muted text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                            {{ auth()->user()->role }}
                        </small>
                    </div>

                    {{-- Avatar Bulat --}}
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold border shadow-sm" 
                         style="width: 38px; height: 38px;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </a>

                {{-- Menu Dropdown --}}
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="adminDropdown">
                    <li>
                        <h6 class="dropdown-header small text-muted">Kelola Akun</h6>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                            <i class="bi bi-person text-secondary"></i> Profil Saya
                        </a>
                    </li>
                    <li><hr class="dropdown-divider opacity-50"></li>
                    <li>
                        {{-- Form Logout --}}
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2 py-2">
                                <i class="bi bi-box-arrow-right"></i> 
                                <span>Keluar / Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>