@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg">Total User</h3>
        <p class="text-3xl font-bold text-indigo-600">120</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg">Total Petugas</h3>
        <p class="text-3xl font-bold text-green-600">8</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg">Data Alat</h3>
        <p class="text-3xl font-bold text-orange-600">45</p>
    </div>
</div>
@endsection
