<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

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
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => 'approved']);

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
}

