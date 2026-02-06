<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::with('user')
            ->latest()
            ->paginate(10);

        return view('user.log-aktivitas', compact('logs'));
    }

    public function show($id)
    {
        $log = ActivityLog::with('user')->findOrFail($id);

        return response()->json([
            'id' => $log->id,
            'user' => $log->user ? ['id' => $log->user->id, 'name' => $log->user->name] : null,
            'activity' => $log->activity,
            'jumlah' => $log->jumlah,
            'tanggal_mulai' => $log->tanggal_mulai,
            'tanggal_selesai' => $log->tanggal_selesai,
            'description' => $log->description,
            'created_at' => $log->created_at->toDateTimeString(),
        ]);
    }
}
