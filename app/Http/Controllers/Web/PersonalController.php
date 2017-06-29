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
        $patient  = Patient::monitor()->where('band_number', $band_number)->first();
        $patients = Patient::monitor()->get();

        // Check if patient exists.
        if($patient)
        {
            // Compare
            $compare = route('patient.compare', [
                'patient_number' => $patient->band_number
            ]);

            // Waiting patients
            $waiting_patients = array_search($patient->band_number, array_map(function($patient) {
                return $patient['band_number'];
            }, $patients->toArray()));

            // Return the status view.
            return view('mobile.status')
                ->with('patient', $patient)
                ->with('compare', $compare)
                ->with('waiting_patients', $waiting_patients)
            ;
        }

        // If is not found.
        else {

            // Return to login.
            return redirect()->route('patient.login')->with('not_found', true);
        }
    }

    public function compare($band_number)
    {
        // Patient
        $patient  = Patient::monitor()->where('band_number', $band_number)->first();
        $patients = Patient::monitor()->get();

        // Check if patient exists.
        if ($patient)
        {
            // Compare
            $status = route('patient.status', [
                'patient_number' => $patient->band_number
            ]);


            // Waiting patients
            $waiting_patients = array_search($patient->band_number, array_map(function($patient) {
                return $patient['band_number'];
            }, $patients->toArray()));

            // Return view.
            return view('mobile.compare')
                ->with('patient', $patient)
                ->with('status', $status)
                ->with('waiting_patients', $waiting_patients)
            ;
        }

        // If is not found.
        else {

            // Return to login.
            return redirect()->route('patient.login')->with('not_found', true);
        }
    }
}
