<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');  // Pastikan ini sesuai dengan view yang Anda buat
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email-username', 'password');

    // Validasi jika email dan password yang dimasukkan sesuai
    if ($credentials['email-username'] == 'muhammad.yusuf@gmail.com' && $credentials['password'] == 'yusuf.absensi') {
      // Login sukses, arahkan ke halaman dashboard atau yang diinginkan
      return redirect()->intended('/dashboard');
    }

    // Jika login gagal, kembalikan pesan error
    return back()->withErrors([
      'email-username' => 'Email salah!',
    ]);
  }
}
