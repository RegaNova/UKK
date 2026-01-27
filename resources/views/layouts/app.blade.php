<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-indigo-600 text-white px-6 py-4 flex justify-between">
        <h1 class="font-bold text-lg">Sistem Peminjaman Alat</h1>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-500 px-4 py-1 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </nav>

    <!-- Content -->
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
