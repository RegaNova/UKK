<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\MakePetugasRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /* ===================== LIST ===================== */

    public function peminjamList()
    {
        $peminjam = User::where('role', 'user')
            ->latest()
            ->paginate(10);

        return view('admin.petugas.peminjam', compact('peminjam'));
    }

    public function petugasList()
    {
        $petugas = User::where('role', 'petugas')
            ->latest()
            ->paginate(10);

        return view('admin.petugas.index', compact('petugas'));
    }

    public function userList()
    {
        $users = User::where('role', 'user')
            ->latest()
            ->get();

        return view('user.users', compact('users'));
    }

    /* ===================== CREATE ===================== */

    public function createPetugasForm()
    {
        return view('admin.petugas.create');
    }

    public function createPetugas(MakePetugasRequest $request)
    {
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'petugas',
        ]);

        return redirect()
            ->route('admin.petugas')
            ->with('success', 'Petugas berhasil ditambahkan');
    }

    /* ===================== EDIT ===================== */

    public function editPetugasForm($id)
    {
        $petugas = User::findOrFail($id);

        return view('admin.petugas.edit', compact('petugas'));
    }

    public function updatePetugas(MakePetugasRequest $request, User $user)
    {
        $this->ensurePetugas($user);

        $data = $request->validated();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('admin.petugas')
            ->with('success', 'Petugas berhasil diperbarui');
    }

    /* ===================== DELETE ===================== */

    public function deletePetugas($id)
    {
        $user = User::findOrFail($id);
        $this->ensurePetugas($user);

        $user->delete();

        return redirect()
            ->route('admin.petugas')
            ->with('success', 'Petugas berhasil dihapus');
    }

    /* ===================== GUARD ===================== */

    private function ensurePetugas(User $user): void
    {
        if ($user->role !== 'petugas') {
            abort(404);
        }
    }
}
