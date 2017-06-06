<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLogin() {
        return view('login.index');
    }

    public function doLogin() {
        return view('dashboard.dashboard.index');
    }
}
