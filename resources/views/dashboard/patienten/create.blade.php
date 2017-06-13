@extends('dashboard.master')

@section('title', 'Inchecken')

@section('content')
    <div class="patient-create white-bg">
        <div class="row">
            <div class="col-md-6 col-12">
                {!! Form::open(array('action' => 'Web\PatientController@store', 'method' => 'POST')) !!}
                <div class="form-group">
                    {!! Form::label('number', 'Patiëntnummer', array('for' => 'number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::number('number', '', array('class' => 'form-control form-style', 'required' => 'required')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('first_name', 'Voornaam', array('for' => 'first_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('first_name', '', array('class' => 'form-control form-style', 'required' => 'required')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('status_id', 'In behandeling (spoed)', array('class' => 'form-label')) !!}
                    {!! Form::checkbox('status_id', 3, false, array('id' => 'checkbox1', 'class' => 'tgl tgl-light', 'style' => 'visibility: hidden')) !!}
                    <label for="checkbox1" class="tgl-btn"></label>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {!! Form::label('band_number', 'Bandnummer', array('for' => 'band_number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::number('band_number', '', array('class' => 'form-control form-style', 'required' => 'required')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('last_name', 'Achternaam', array('for' => 'last_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('last_name', '', array('class' => 'form-control form-style', 'required' => 'required')) !!}
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