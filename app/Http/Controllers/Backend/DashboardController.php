<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $userName = Auth::user()->name;
        return view('backend.pages.dashboard')->with(['userName' => $userName]);
    }
}
