<?php

namespace IPMEDT4K\Http\Controllers\Web;

use \DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use IPMEDT4K\Http\Controllers\Controller;
use IPMEDT4K\Models\Triage;
use IPMEDT4K\Models\Patient;

class MonitorController extends Controller
{
    public function __invoke ()
    {
        // Triages
        $triages = Triage::all();

        // Triage count
        $triage_count = Patient::monitor()
            ->select('triage_id', DB::raw('count(*) as patients_count'))
            ->groupBy('triage_id')
            ->get()
        ;

        // Patients
        $patients = Patient::monitor()->get();

        // Return the monitor view.
        return view('monitor.monitor')
            ->with('triages', $triages)
            ->with('triage_count', $triage_count)
            ->with('patients', $patients)
        ;
    }
}
