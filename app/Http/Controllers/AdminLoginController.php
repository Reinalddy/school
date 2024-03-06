<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AdminLoginController extends Controller
{
    public function index(Request $request) {
        return view('admin.login.login');
    }

    public function admin_login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where('email', $email)->first();
        if(!$admin) {
            return redirect()->back()->with('error', 'Email not found');
        }

        if(password_verify($password, $admin->password)) {
            $request->session()->regenerate();
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }


    }
}
