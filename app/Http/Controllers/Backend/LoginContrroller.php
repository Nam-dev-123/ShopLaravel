<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginContrroller extends Controller
{
    public function index() {
        return view('backend.pages.login');
    }

    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email, 'password'=>$password])) {
           return redirect()->route('admin.dashboard');
        } else {
            echo "that bai";
        }
    }

    public function logout() {
        Auth::logout();
        return view('backend.pages.login');
    }
}
