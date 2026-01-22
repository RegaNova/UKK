<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::latest()->get();
        return view('alat.index', compact('alat'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')
            ->with('success', 'Data alat berhasil ditambahkan');
    }

    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $alat->update($request->all());

        return redirect()->route('alat.index')
            ->with('success', 'Data alat berhasil diupdate');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();

        return redirect()->route('alat.index')
            ->with('success', 'Data alat berhasil dihapus');
    }
}
