<?php

namespace IPMEDT4K\Http\Controllers\API;

use DB;
use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;
use IPMEDT4K\Models\Patient;

class PatientController extends Controller
{
    public function index () {
        return Patient::monitor()->get();
    }

    public function count () {
        return [
            'onmiddelijk' => Patient::onmiddelijk()->wachten()->count(),
            'hoog-urgent' => Patient::hoogUrgent()->wachten()->count(),
            'urgent'      => Patient::urgent()->wachten()->count(),
            'standaard'   => Patient::standaard()->wachten()->count(),
            'niet-urgent' => Patient::nietUrgent()->wachten()->count()
        ];
    }

    /**
     * @param $band_number
     * @return mixed
     */
    public function getPatient ($band_number)
    {
        return Patient::where('band_number', $band_number)->first();
    }

    /**
     * @param $band_number
     * @return mixed
     */
    public function waitingPatients ($band_number) {

        // Patient
        $patient  = Patient::where('band_number', $band_number)->first();

        // Check if the patient is found.
        if ($patient) {

            // Get the patients
            $patients = Patient::monitor()->get();

            // Waiting patients
            return response(['waiting' => array_search($patient->band_number, array_map(function($patient) {
                return $patient['band_number'];
            }, $patients->toArray()))]);
        }
    }

    /**
     * @return mixed
     */
    public function lastTenPatients () {
        return Patient::orderBy('created_at', 'DESC')->take(10)->get();
    }

    /**
     *
     */
    public function noTriage () {
        return Patient::where('triage_id', null)->get();
    }
}
