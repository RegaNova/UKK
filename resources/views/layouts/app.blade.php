<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- SIDEBAR -->
    <aside class="position-fixed top-0 start-0 vh-100 bg-dark text-white"
           style="width:260px; z-index:1030;">
        <x-sidebar role="{{ auth()->user()->role }}" />
    </aside>

    <!-- TOPBAR -->
    @include('layouts.topbar')

    <!-- CONTENT -->
    <div class="min-vh-100 overflow-auto" style="margin-left:260px;">
        <main class="p-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
