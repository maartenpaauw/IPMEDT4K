<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use IPMEDT4K\Http\Controllers\Controller;
use IPMEDT4K\Models\Patient;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function __invoke ()
    {
        // Triage count
        $triage_count = [
            'onmiddelijk' => Patient::onmiddelijk()->wachten()->count(),
            'hoog-urgent' => Patient::hoogUrgent()->wachten()->count(),
            'urgent'      => Patient::urgent()->wachten()->count(),
            'standaard'   => Patient::standaard()->wachten()->count(),
            'niet-urgent' => Patient::nietUrgent()->wachten()->count()
        ];

        // Patients
        $patients = Patient::monitor()->get();

        // Return the monitor view.
        return view('dashboard.dashboard.index')
            ->with('triage_count', json_encode($triage_count))
            ->with('patients', $patients)
        ;
    }
}
