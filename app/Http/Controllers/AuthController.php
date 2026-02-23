<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // login pakai email dan password
        $credential = $request->only('email', 'password');
        if(auth()->attempt($credential)){
            $request->session()->regenerate();
            return redirect('/cek')->with('success', 'Hore! Kamu berhasil masuk.');
        }

        return back()->with('error', 'Yah, email atau kata sandi salah. Coba lagi ya!');
    }

    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'npsn' => 'required',
            'nama_sekolah' => 'required',
            'nomor_whatsapp' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validated['password'] = bcrypt($request->password);

        User::create($validated);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
        
    }

    public function dashboard(){
        return view('cms.dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil keluar.');
    }

    public function landingPage()
    {
        $materi = Materi::latest()->get();
        return view('cek', compact('materi'));
    }
}
