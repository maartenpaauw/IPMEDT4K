<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\View\View;
use IPMEDT4K\Http\Controllers\Controller;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke ()
    {
        // Return the monitor view.
        return view('monitor.monitor');
    }
}
