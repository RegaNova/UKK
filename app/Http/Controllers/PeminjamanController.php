<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PeminjamanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $peminjamans = Peminjaman::where('user_id', $user->id)->latest()->get();
        $alats = Alat::all();

        return view('user.loans', compact('peminjamans', 'alats'));
    }

    public function create()
    {
        $alats = Alat::all();
        return view('user.loans', compact('alats'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'alat_id' => ['required', 'exists:alats,id'],
            'jumlah' => ['required', 'integer', 'min:1'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'keterangan' => ['nullable', 'string', 'max:1000'],
        ]);

        // cek stok alat
        $alat = Alat::find($validated['alat_id']);
        if (!$alat) {
            return Redirect::back()->withErrors(['alat_id' => 'Alat tidak ditemukan.'])->withInput();
        }

        if ($validated['jumlah'] > $alat->jumlah) {
            return Redirect::back()->withErrors(['jumlah' => 'Stok alat tidak mencukupi.'])->withInput();
        }

        $peminjaman = Peminjaman::create([
            'user_id' => $user->id,
            'alat_id' => $validated['alat_id'],
            'jumlah' => $validated['jumlah'],
            'tanggal_mulai' => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'keterangan' => $validated['keterangan'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('user.peminjaman')->with('success', 'Permintaan peminjaman berhasil dikirim.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $peminjaman = Peminjaman::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        return view('user.peminjaman_show', compact('peminjaman'));
    }
}
