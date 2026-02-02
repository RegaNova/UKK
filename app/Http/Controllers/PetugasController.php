<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Alat;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function showDashboard()
    {
        $totalPending = Peminjaman::where('status', 'pending')->count();
        $totalApproved = Peminjaman::where('status', 'approved')->count();
        $totalRejected = Peminjaman::where('status', 'rejected')->count();
        
        return view('petugas.dashboard', compact(
            'totalPending',
            'totalApproved',
            'totalRejected'
        ));
    }

    public function showPeminjamanList()
    {
        $peminjamans = Peminjaman::with('user', 'alat')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('petugas.peminjaman_list', compact('peminjamans'));
    }

    public function approvePeminjaman($id)
    {
        $peminjaman = Peminjaman::with('alat')->findOrFail($id);

        if ($peminjaman->status !== 'pending') {
            return redirect()->back()->with('warning', 'Peminjaman tidak dalam status pending.');
        }

        $alat = $peminjaman->alat;
        if (!$alat) {
            return redirect()->back()->with('error', 'Alat tidak ditemukan.');
        }

        if ($alat->jumlah < $peminjaman->jumlah) {
            return redirect()->back()->with('error', 'Stok alat tidak mencukupi untuk menyetujui peminjaman.');
        }

        DB::transaction(function () use ($peminjaman, $alat) {
            // kurangi stok
            $alat->jumlah = $alat->jumlah - $peminjaman->jumlah;
            $alat->save();

            $peminjaman->update(['status' => 'approved']);
        });

        return redirect()->back()->with('success', 'Peminjaman berhasil disetujui.');
    }

    public function rejectPeminjaman(Request $request, $id)
    {
        $validated = $request->validate([
            'alasan' => 'required|string|max:500',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => 'rejected',
            'keterangan' => $validated['alasan'],
        ]);

        return redirect()->back()->with('success', 'Peminjaman berhasil ditolak.');
    }

    public function returnPeminjaman($id)
    {
        $peminjaman = Peminjaman::with('alat')->findOrFail($id);

        if ($peminjaman->status !== 'approved') {
            return redirect()->back()->with('warning', 'Hanya peminjaman yang berstatus approved yang dapat dikembalikan.');
        }

        $alat = $peminjaman->alat;
        if (!$alat) {
            return redirect()->back()->with('error', 'Alat tidak ditemukan.');
        }

        DB::transaction(function () use ($peminjaman, $alat) {
            $alat->jumlah = $alat->jumlah + $peminjaman->jumlah;
            $alat->save();

            $peminjaman->update(['status' => 'returned']);
        });

        return redirect()->back()->with('success', 'Peminjaman ditandai telah dikembalikan dan stok diperbarui.');
    }
}

