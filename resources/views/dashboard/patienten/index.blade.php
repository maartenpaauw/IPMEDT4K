@extends('dashboard.master')

@section('titleExtra2', 'Patiënten')

@section('contentExtra2')
    <table id="patientsTable" class="table tablesorter table-striped bg-white">
        <thead>
        <tr>
            <th class="th-clickable border-right-1">Urg <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Patientnummer <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Naam <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Status <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Code <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Ingecheckt <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="border-right-1">Urgentie Wijzigen</th>
            <th>Uitchecken</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patienten as $patient)
            @if($patient->status_id === 1 || $patient->status_id === 2 || $patient->status_id === 3)
                <tr class="tableResults">
                    <td class="p-0">
                        @if(is_null($patient->triage_id))
                            <div class="urgentie white-bg"></div>
                            <div class="invisible displaynone">
                                0
                            </div>
                        @else()
                            <div class="urgentie bg-{!! $patient->triage->slug !!}"></div>
                            <div class="invisible displaynone">
                                {!! $patient->triage_id !!}
                            </div>
                        @endif
                    </td>
                    <td class="pt-4">
                        {!! $patient->number !!}
                    </td>
                    <td class="pt-4">
                        <b>{!! $patient->first_name . " " . $patient->last_name !!}</b>
                    </td>
                    <td class="pt-4">
                        <i class="fa fa-clock-o"></i> {!! $patient->status->name !!}
                    </td>
                    <td class="pt-4">
                        {!! $patient->band_number !!}
                    </td>
                    <td class="pt-4">
                        <div class="date">{!! $patient->created_at !!}</div>
                    </td>
                    <td>
                        <a class="btn btn-success rounded" href="{!! route('patienten.edit', $patient->id) !!}">Wijzigen</a>
                    </td>
                    <td>
                        {!! Form::model($patient, ['method' => 'PATCH', 'action' => ['Web\PatientController@checkout',$patient->id], 'id' => 'checkoutform']) !!}
                        {!! Form::submit('Uitchecken', array('class' => 'btn btn-danger rounded')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection

@section('title', 'Inchecken')

@section('content')
    <div class="patient-create white-bg">
        <div class="row">
            <div class="col-6">
                {!! Form::open(array('action' => 'Web\PatientController@store', 'method' => 'POST', 'id' => 'checkinform')) !!}
                <div class="form-group mt-4">
                    {!! Form::label('first_name', 'Voornaam', array('for' => 'first_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('first_name', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'minlength' => '2', 'data-parsley-pattern' => '^[A-Za-z ]*$', 'parsley-rangelength' => '2,50]')) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mt-4">
                    {!! Form::label('last_name', 'Achternaam', array('for' => 'last_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('last_name', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'minlength' => '2', 'data-parsley-pattern' => '^[A-Za-z ]*$', 'parsley-rangelength' => '2,50]')) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mt-4">
                    {!! Form::label('number', 'Patiëntnummer', array('for' => 'number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::number('number', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'min' => '10000', 'max' => '99999')) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mt-4">
                    {!! Form::label('band_number', 'Bandnummer', array('for' => 'band_number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::number('band_number', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'min' => '10000', 'max' => '99999')) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mt-4">
                    {!! Form::label('status_id', 'In behandeling (spoed)', array('class' => 'form-label')) !!}
                    {!! Form::checkbox('status_id', 3, false, array('id' => 'checkbox1', 'class' => 'tgl tgl-light', 'style' => 'visibility: hidden')) !!}
                    <label for="checkbox1" class="tgl-btn"></label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="form-group">
                    {!! Form::submit('Inchecken', array('class' => 'btn btn-success btn-inchecken')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('titleExtra', 'Zoeken')

@section('contentExtra')
    <div class="patient-search white-bg">
        <div class="row">
            <div class="col-12">
                <input type="search" class="form-control form-style pl-2" name="searchPatient" id="searchPatient" placeholder="Type hier uw zoekterm..." />
            </div>
        </div>
    </div>
@endsection

@section('parsley')
    <script>
        $(function () {
            $('#checkinform').parsley();
        })
    </script>
@endsection