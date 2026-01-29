<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\MakePetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function peminjamList()
    {
        $peminjam = User::where("role", "user")->orderBy("id", "desc")->paginate(10);
        return view("admin.petugas.peminjam", compact("peminjam"));
    }

    public function petugasList()
    {
        $petugas = User::where("role", "petugas")->orderBy("id", "desc")->paginate(10);
        return view("admin.petugas.index", compact("petugas"));
    }

    public function createPetugasForm()
    {
        return view("admin.petugas.create");
    }

    public function createPetugas(MakePetugasRequest $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => "petugas",
        ]);

        return redirect()->back()->with("success", "Petugas berhasil ditambahkan");
    }

    public function editPetugasForm($id)
    {
        $petugas = User::find($id);
        if (!$petugas) {
            return redirect()->back()->with("error", "Petugas tidak ditemukan");
        }
        return view("admin.petugas.edit", compact("petugas"));
    }

    public function updatePetugas(MakePetugasRequest $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return redirect()->back()->with("error", "Petugas tidak ditemukan");
        }

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        return redirect()->back()->with("success", "Petugas berhasil diupdate");
    }

    public function deletePetugas($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with("error", "Petugas tidak ditemukan");
        }

        $user->delete();

        return redirect()->back()->with("success", "Petugas berhasil dihapus");
    }
}
