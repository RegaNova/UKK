<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Aplikasi Peminjaman Alat</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2 bg-light min-vh-100 p-3">
                @yield('sidebar')
            </aside>
            <main class="col-md-10 p-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>