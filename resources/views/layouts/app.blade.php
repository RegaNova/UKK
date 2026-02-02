<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    {{-- SIDEBAR --}}
    <aside class="position-fixed top-0 start-0 bg-dark text-white"
           style="width:260px; height:100vh; z-index:1040;">
        <x-sidebar role="{{ auth()->user()->role }}" />
    </aside>

    {{-- TOPBAR (FIXED) --}}
    <header class="position-fixed top-0 bg-white border-bottom shadow-sm"
            style="left:260px; right:0; height:64px; z-index:1030;">
        @include('layouts.topbar')
    </header>

    {{-- CONTENT WRAPPER --}}
    <div style="margin-left:260px; margin-top:64px;">
        <main class="p-4 min-vh-100">
            @yield('content')
        </main>
    </div>

</body>
</html>
