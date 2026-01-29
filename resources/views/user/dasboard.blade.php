@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<h2 class="text-2xl font-bold mb-6">
    Halo, {{ auth()->user()->name }} 👋
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg">Peminjaman Aktif</h3>
        <p class="text-3xl font-bold text-indigo-600">1</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg">Riwayat Peminjaman</h3>
        <p class="text-3xl font-bold text-gray-600">6</p>
    </div>
</div>
@endsection