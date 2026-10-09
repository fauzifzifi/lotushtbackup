<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function proses(Request $request)
    {
        // 1. Validasi: kedua kolom wajib diisi
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Username atau email belum diisi.',
            'password.required' => 'Password belum diisi.',
        ]);

        // 2. Cek akun ke database
        $kredensial = $request->only('email', 'password');

        if (Auth::attempt($kredensial, $request->boolean('remember'))) {
            // 3. Berhasil: ganti session id demi keamanan
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        // 4. Gagal: kembali ke form, email tetap terisi, password dikosongkan
        return back()
            ->withErrors(['login' => 'Kombinasi akun tidak sesuai.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Matikan session lama dan buat token CSRF baru
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}