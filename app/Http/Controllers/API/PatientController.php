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
        return Patient::monitor(true)
            ->without('status')
            ->select('triage_id', DB::raw('count(*) as patients_count'))
            ->groupBy('triage_id')
            ->get()
        ;
    }
}
