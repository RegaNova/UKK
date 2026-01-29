<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view("admin.kategori.index", compact("kategori"));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.kategori.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $request)
    {
        Kategori::create($request->validated());
        return redirect()->back()->with("success", "Kategori berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $kategori = Kategori::find($id);
        return view("admin.kategori.show", compact("kategori"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view("admin.kategori.edit", compact("kategori"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!Alat::exists($kategori->id)) {
            return redirect()->back()->with("error","Kategori Masih digunakan di alat");
        }
        $kategori->delete();
        return redirect()->back()->with("success","Kategori Berhasil Dihapus");
    }
}
