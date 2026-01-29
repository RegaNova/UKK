@props(['role'])

<aside class="w-64 bg-indigo-700 text-white min-h-screen flex flex-col">

    <div class="h-16 flex items-center justify-center font-bold text-lg border-b border-indigo-600">
        Peminjaman Alat
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2">

        {{-- ADMIN --}}
        @if ($role === 'admin')
            <p class="text-xs uppercase text-indigo-300 mt-2">Admin</p>
            <a href="#" class="menu active">Dashboard</a>
            <a href="#" class="menu">Kelola User</a>
            <a href="#" class="menu">Data Alat</a>
            <a href="#" class="menu">Kategori Alat</a>
            <a href="#" class="menu">Data Peminjaman</a>
            <a href="#" class="menu">Data Pengembalian</a>
            <a href="#" class="menu">Log Aktivitas</a>
            <a href="#" class="menu">Laporan</a>
        @endif

        {{-- PETUGAS --}}
        @if ($role === 'petugas')
            <p class="text-xs uppercase text-indigo-300 mt-2">Petugas</p>
            <a href="#" class="menu active">Dashboard</a>
            <a href="#" class="menu">Persetujuan Peminjaman</a>
            <a href="#" class="menu">Monitoring Pengembalian</a>
            <a href="#" class="menu">Cetak Laporan</a>
        @endif

        {{-- PEMINJAM --}}
        @if ($role === 'user')
            <p class="text-xs uppercase text-indigo-300 mt-2">Peminjam</p>
            <a href="#" class="menu active">Dashboard</a>
            <a href="#" class="menu">Daftar Alat</a>
            <a href="#" class="menu">Ajukan Peminjaman</a>
            <a href="#" class="menu">Pengembalian Alat</a>
            <a href="#" class="menu">Riwayat</a>
        @endif

    </nav>

    <div class="p-4 border-t border-indigo-600">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full px-4 py-2 rounded hover:bg-red-600 transition">
                Logout
            </button>
        </form>
    </div>
</aside>

<style>
    .menu {
        @apply block px-4 py-2 rounded hover:bg-indigo-800 transition;
    }
    .menu.active {
        @apply bg-indigo-800;
    }
</style>
