<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;
use IPMEDT4K\Models\Patient;

class HistoryController extends Controller
{
    public function index()
    {
        $patienten = Patient::all();

        return view('dashboard.historie.index')
            ->with('patienten', $patienten
            );
    }

    public function destroy($id) {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect('historie');
    }
}
