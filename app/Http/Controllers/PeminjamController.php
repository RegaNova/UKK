<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
        
        $activeLoans = Peminjaman::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();
        
        $pendingLoans = Peminjaman::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();
        
        $approvedLoans = Peminjaman::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();
        
        $totalLoans = Peminjaman::where('user_id', $user->id)->count();
        
        return view('user.dasboard', compact(
            'activeLoans', 
            'pendingLoans', 
            'approvedLoans', 
            'totalLoans'
        ));
    }
}

