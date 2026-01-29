@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
<h2 class="text-2xl font-bold mb-6">Dashboard Petugas</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg">Peminjaman Masuk</h3>
        <p class="text-3xl font-bold text-blue-600">12</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg">Pengembalian Hari Ini</h3>
        <p class="text-3xl font-bold text-green-600">5</p>
    </div>
</div>
@endsection
