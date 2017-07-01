<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }
}
