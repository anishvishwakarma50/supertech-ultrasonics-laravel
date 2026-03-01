<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $admin_cred = $request->only(['name', 'password']);
        
        if(Auth::attempt($admin_cred)) {
            $request->session()->regenerate();
            
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Creadentials are Not Correct');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/admin/login');
    }
}
