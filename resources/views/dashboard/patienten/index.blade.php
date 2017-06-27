@extends('dashboard.master')

@section('titleExtra', 'Inchecken')

@section('contentExtra')
    <div class="patient-create white-bg">
        <div class="row">
            <div class="col-12">
                {!! Form::open(array('action' => 'Web\PatientController@store', 'method' => 'POST', 'id' => 'checkinform')) !!}
                <div class="form-group mt-4">
                    {!! Form::label('first_name', 'Voornaam', array('for' => 'first_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('first_name', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'minlength' => '2', 'data-parsley-pattern' => '^[A-Za-z ]*$', 'parsley-rangelength' => '2,50]')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('last_name', 'Achternaam', array('for' => 'last_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('last_name', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'minlength' => '2', 'data-parsley-pattern' => '^[A-Za-z ]*$', 'parsley-rangelength' => '2,50]')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number', 'Patiëntnummer', array('for' => 'number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::number('number', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'min' => '10000', 'max' => '99999')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('band_number', 'Bandnummer', array('for' => 'band_number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::number('band_number', '', array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'min' => '10000', 'max' => '99999')) !!}
                </div>
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

@section('parsley')
    <script>
        $(function () {
            $('#checkinform').parsley();
        })
    </script>
@endsection

@section('title', 'Patiënten')

@section('content')
    <div class="card items">
        <ul class="item-list striped">
            <li class="item item-list-header hidden-sm-down">
                <div class="item-row pl-0">
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span class="pl-1">Urg</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Patientnummer</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Naam</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Status</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Code</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Ingecheckt</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div class="no-overflow">
                            <span>Urgentie Wijzigen</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div class="no-overflow">
                            <span>Uitchecken</span>
                        </div>
                    </div>
                </div>
            </li>
            @foreach($patienten as $patient)
                @if($patient->status_id === 1 || $patient->status_id === 2 || $patient->status_id === 3)
                    <li class="item">
                <div class="item-row pl-0">
                    <div class="item-col item-col-title p-0">
                        @if(is_null($patient->triage_id))
                            <div class="urgentie white-bg"></div>
                        @else()
                        <div class="urgentie bg-{!! $patient->triage->slug !!}"></div>
                        @endif
                    </div>
                    <div class="item-col item-col-title">
                        {!! $patient->number !!}
                    </div>
                    <div class="item-col item-col-title">
                        <h4 class="item-title">{!! $patient->first_name . " " . $patient->last_name !!}</h4>
                    </div>
                    <div class="item-col item-col-title">
                        <div>
                            <i class="fa fa-clock-o"></i> {!! $patient->status->name !!}
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div>
                            {!! $patient->band_number !!}
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div class="no-overflow">
                            {!! $patient->created_at !!}
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div class="no-overflow">
                            <a class="btn btn-success rounded" href="{!! route('patienten.edit', $patient->id) !!}">Wijzigen</a>
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div class="no-overflow">
                            {!! Form::model($patient, ['method' => 'PATCH', 'action' => ['Web\PatientController@checkout',$patient->id], 'id' => 'checkoutform']) !!}
                            {!! Form::submit('Uitchecken', array('class' => 'btn btn-danger rounded')) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection