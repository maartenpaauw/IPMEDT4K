<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;
use IPMEDT4K\Models\Patient;
use IPMEDT4K\Models\Triage;

class PersonalController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('mobile.login');
    }

    /**
     * @param $band_number
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function status($band_number)
    {
        // Patient
        $patient = Patient::where('band_number', $band_number)->first();

        // Check if patient exists.
        if($patient)
        {
            // Compare
            $compare = route('patient.compare', [
                'patient_number' => $patient->band_number,
                'triage' => $patient->triage->slug
            ]);

            // Return the status view.
            return view('mobile.status')
                ->with('patient', $patient)
                ->with('compare', $compare)
            ;
        }
    }

    public function compare($band_number)
    {
        // Patient
        $patient = Patient::where('band_number', $band_number)->first();

        // Check if patient exists.
        if ($patient)
        {
            // Return view.
            return view('mobile.compare')
                ->with('patient', $patient)
            ;
        }
    }
}
