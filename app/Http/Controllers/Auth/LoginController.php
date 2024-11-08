<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request) {
        $data = $request->validated();
        
        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            // notify()->success("Login successfully");
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'email' => "This credentials doesn't match our records"
            ])->onlyInput('email');
        }
    }

    public function logout() {
        Auth::logout();
        // notify()->success('Logout successfully');
        return back();
    }
}
