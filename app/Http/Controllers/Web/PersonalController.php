<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function __invoke ()
    {
        return view('mobile.index');
    }

    public function login()
    {
        return view('mobile.login');
    }
}
