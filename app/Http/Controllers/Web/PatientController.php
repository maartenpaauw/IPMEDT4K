<?php

namespace IPMEDT4K\Http\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;
use IPMEDT4K\Models\Patient;
use IPMEDT4K\Models\Status;
use IPMEDT4K\Models\Triage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $patienten = Patient::all();

        return view('dashboard.patienten.index')
            ->with('patienten', $patienten
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.patienten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|unique:patients',
            'first_name' => 'required',
            'band_number' => 'required|unique:patients',
            'last_name' => 'required',
        ]);


        $patient = new Patient;
        $patient->number = $request->number;
        $patient->first_name = $request->first_name;
        $patient->band_number = $request->band_number;
        $patient->last_name = $request->last_name;
        $patient->checked_in_at = Carbon::now();
        $patient->status_id = $request->input('status_id') ? intval($request->input('status_id')) : Triage::onmiddelijk()->id;

        if($request->input('status_id') == Status::inBehandeling()->id){
            $patient->triage_id = Triage::onmiddelijk()->id;
        }

        $patient->save();

        return redirect('patienten');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('dashboard.patienten.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view('dashboard.patienten.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $this->validate($request, [
            'number' => 'required|unique:patients,number,'.$id,
            'first_name' => 'required',
            'band_number' => 'required|unique:patients,band_number,'.$id,
            'last_name' => 'required',
        ]);

        $patient->number = $request->number;
        $patient->first_name = $request->first_name;
        $patient->triage_id = $request->triage_id;
        $patient->band_number = $request->band_number;
        $patient->last_name = $request->last_name;
        $patient->checked_in_at = Carbon::now();

        if($request->input('status_id') == Status::uitgecheckt()->id){
            $patient->checked_out_at = Carbon::now();
        }

        if($request->input('status_id') == Status::inBehandeling()->id){
            $patient->treated_at = Carbon::now();
        }


        $patient->status_id = $request->input('status_id') ? intval($request->input('status_id')) : Triage::onmiddelijk()->id;

        $patient->update();

        return redirect('patienten');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect('patienten');
    }


    public function checkout($id) {
        $patient = Patient::findOrFail($id);
        $patient->status_id = Status::uitgecheckt()->id;
        $patient->checked_out_at = Carbon::now();

        $patient->update();

        return redirect('patienten');

    }
}
