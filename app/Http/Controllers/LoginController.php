<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login_user(Request $request) {

        $user = User::where('email', $request->email)->first();

        if(isset($user)) {

            if(password_verify($request->password, $user->password)) {
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index');
    }

    public function register_index() {
        return view('register');
    }

    public function register_user(Request $request) {
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login.index')->with('success', 'User registered successfully');
    }
}
