@extends('dashboard.master')

@section('title', 'Inchecken')

@section('content')
    <div class="patient-create white-bg">
        <div class="row">
            <div class="col-md-6 col-12">
                {!! Form::open(array('url' => 'patient/create')) !!}
                <div class="form-group">
                    {!! Form::label('patient_number', 'Patiëntnummer', array('for' => 'patient_number', 'class' => 'form-label')) !!}
                    {!! Form::text('patient_number', '', array('class' => 'form-control form-style', 'placeholder' => '450299')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('first_name', 'Voornaam', array('for' => 'first_name', 'class' => 'form-label')) !!}
                    {!! Form::text('first_name', '', array('class' => 'form-control form-style', 'placeholder' => 'Zowie')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('triage_id', 'Triage kleur', array('for' => 'triage_id', 'class' => 'form-label')) !!}
                    <div class="checkRadioContainer">
                        <label class="brand-danger-bg">
                            {!! Form::radio('radioGroup', 'triage_red')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-warning-bg">
                            {!! Form::radio('radioGroup', 'triage_red')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-watchout-bg">
                            {!! Form::radio('radioGroup', 'triage_red')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-success-bg">
                            {!! Form::radio('radioGroup', 'triage_red')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-info-bg">
                            {!! Form::radio('radioGroup', 'triage_red')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {!! Form::label('band_number', 'Bandnummer', array('for' => 'band_number', 'class' => 'form-label')) !!}
                    {!! Form::text('band_number', '', array('class' => 'form-control form-style', 'placeholder' => '15939002')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('last_name', 'Achternaam', array('for' => 'last_name', 'class' => 'form-label')) !!}
                    {!! Form::text('last_name', '', array('class' => 'form-control form-style', 'placeholder' => 'van Geest')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('status_id', 'Status', array('class' => 'form-label')) !!}
                    {!! Form::checkbox('status_toggle', 'status_toggle', false, array('id' => 'checkbox1', 'class' => 'tgl tgl-light', 'style' => 'visibility: hidden')) !!}
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