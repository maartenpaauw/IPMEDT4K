<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\View\View;
use IPMEDT4K\Http\Controllers\Controller;
use IPMEDT4K\Models\Triage;

class MonitorController extends Controller
{
    public function __invoke ()
    {
        // Triages
        $triages = Triage::all();

        // Return the monitor view.
        return view('monitor.monitor')
            ->with('triages', $triages)
        ;
    }
}
