<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\MakePetugasRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    // login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    // register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // login logic
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // register logic
    public function register(RegisterRequest $request)
    {
        $payload = $request->validated();

        $user = User::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => bcrypt($payload['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    // logout logic
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }

    // make petugas form
    public function makePetugasForm()
    {
        return view('auth.make-petugas');
    }

    // make petugas logic
    public function makePetugas(MakePetugasRequest $request)
    {
        $payload = $request->validated();

        $user = User::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => bcrypt($payload['password']),
            'role' => 'petugas',
        ]);

        return redirect()->back()->with('success', 'Successfully created petugas account.');
    }

    // petugas detail view
    public function makePetugasDetail($id)
    {
        $user = User::findOrFail($id);
        return view('auth.make-petugas-detail', compact('user'));
    }

    public function editPetugasForm($id)
    {
        $user = User::findOrFail($id);
        return view('auth.edit-petugas', compact('user'));
    }
    

    // edit petugas logic
    public function editPetugas(MakePetugasRequest $request, $id)
    {
        $payload = $request->validated();

        $user = User::findOrFail($id);

        $user->update([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => bcrypt($payload['password']),
        ]);

        return redirect()->back()->with('success', 'Successfully updated petugas account.');
    }

    // delete petugas logic
    public function deletePetugas($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Successfully deleted petugas account.');
    }
}
