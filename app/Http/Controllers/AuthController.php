<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle authentication.
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
        ]);

        // Check if user exists
        $user = User::where('nik', $request->nik)->first();

        if ($user) {
            // Log the user in (using session manually)
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Login berhasil.');
        }

        return back()->withErrors(['nik' => 'NIK tidak ditemukan.'])->withInput();
    }

    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:users,nik',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'nik' => $request->nik,
        ]);

        // Automatically log in the user after registration
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil.');
    }

    /**
     * Logout the user.
     */
    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('login')->with('success', 'Logout berhasil.');
    // }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
