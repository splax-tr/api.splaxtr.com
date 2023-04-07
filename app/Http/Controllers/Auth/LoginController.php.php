<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController.php extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember');

    if (Auth::attempt($credentials, $remember)) {
        // user verified // kullanıcı doğrulandı
        return redirect()->intended('/');
    }

    // user could not be verified // kullanıcı doğrulanamadı
    return back()->withErrors([
        'username' => 'The username information provided does not match our records.',
        'email' => 'The email information provided does not match our records.',
        'password' => 'The password information provided does not match our records.',
    ]);
}

}
