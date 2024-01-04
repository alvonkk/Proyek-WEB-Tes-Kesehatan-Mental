<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('landing.login');
    }

    public function register()
    {
        return view('landing.register');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard'); // You can change the redirect path as needed
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function postRegister(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Hash the password before saving it to the database
        $hashedPassword = Hash::make($validatedData['password']);

        // Create user logic here (you may use Eloquent or any other method)
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'role' => 'client'
        ]);

        // Redirect to login page after successful registration
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // You can change the redirect path after logout
    }
}
