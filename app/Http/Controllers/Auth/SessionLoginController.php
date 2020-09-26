<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Components\Session;

class SessionLoginController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function sessionLogin()
    {
        if (Session::isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if (Session::isUser()) {
            return redirect()->route('home');
        }
    }
}
