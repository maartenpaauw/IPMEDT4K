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
    public function waitingPatients ($band_number) {

        // Patient
        $patient  = Patient::monitor()->where('band_number', $band_number)->first();
        $patients = Patient::monitor()->get();

        // Waiting patients
        return response(['waiting' => array_search($patient->band_number, array_map(function($patient) {
            return $patient['band_number'];
        }, $patients->toArray()))]);
    }
}
