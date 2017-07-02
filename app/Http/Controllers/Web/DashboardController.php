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

        // Latest patients
        $latest_patients = Patient::orderBy('created_at', 'DESC')->take(10)->get();

        // Patients without a triage.
        $patients_without_triage = Patient::where('triage_id', null)->get();

        // Return the monitor view.
        return view('dashboard.dashboard.index')
            ->with('triage_count', json_encode($triage_count))
            ->with('patients', $patients)
            ->with('latest_patients', $latest_patients)
            ->with('patients_without_triage', $patients_without_triage)
        ;
    }
}
