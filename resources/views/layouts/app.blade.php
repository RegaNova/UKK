<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR KIRI -->
    <x-sidebar role="{{ auth()->user()->role }}" />

    <!-- KONTEN KANAN -->
    <div class="flex-fill">

        <!-- HEADER -->
        @include('layouts.topbar')

        <!-- CONTENT -->
        <main class="p-4">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
