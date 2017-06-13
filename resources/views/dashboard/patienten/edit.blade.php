@extends('dashboard.master')

@section('title', 'Edit Patiënt')

@section('content')
    <div class="patient-create white-bg">
        <div class="row">
            <div class="col-12">
                {!! Form::model($patient, ['method' => 'PATCH', 'action' => ['Web\PatientController@update',$patient->id], 'id' => 'editcheckinform']) !!}
                <div class="form-group mt-4">
                    {!! Form::label('first_name', 'Voornaam', array('for' => 'first_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('first_name', null, array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'minlength' => '2', 'data-parsley-pattern' => '^[A-Za-z ]*$', 'parsley-rangelength' => '2,50]')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('last_name', 'Achternaam', array('for' => 'last_name', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('last_name', null, array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'minlength' => '2', 'data-parsley-pattern' => '^[A-Za-z ]*$', 'parsley-rangelength' => '2,50]')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number', 'Patiëntnummer', array('for' => 'number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('number', null, array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'min' => '10000', 'max' => '99999')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('band_number', 'Bandnummer', array('for' => 'band_number', 'class' => 'form-label')) !!}<span class="brand-danger"> *</span>
                    {!! Form::text('band_number', null, array('class' => 'form-control form-style', 'required' => 'required', 'data-parsley-trigger' => 'change', 'min' => '10000', 'max' => '99999')) !!}
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('triage_id', 'Triage kleur', array('for' => 'triage_id', 'class' => 'form-label', 'required' => 'required', 'data-parsley-trigger' => 'change')) !!}<span class="brand-danger"> *</span>
                    <div class="checkRadioContainer">
                        <label class="brand-danger-bg">
                            {!! Form::radio('triage_id', '1')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-warning-bg">
                            {!! Form::radio('triage_id', '2')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-watchout-bg">
                            {!! Form::radio('triage_id', '3')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-success-bg">
                            {!! Form::radio('triage_id', '4')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                        <label class="brand-info-bg">
                            {!! Form::radio('triage_id', '5')!!}
                            <i class="fa fa-check fa-2x"></i>
                        </label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    {!! Form::label('status_id', 'Status', array('class' => 'form-label', 'required' => 'required', 'data-parsley-trigger' => 'change')) !!}<span class="brand-danger"> *</span>
                    {!! Form::select('status_id', array(
                    '1' => 'Ingecheckt',
                    '2' => 'Wachten',
                    '3' => 'In Behandeling',
                    '4' => 'Uitgecheckt'
                    ), null, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="form-group">
                    {!! Form::submit('Wijzigingen Opslaan', array('class' => 'btn btn-success btn-inchecken')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('parsley')
    <script>
        $(function () {
            $('#editcheckinform').parsley();
        })
    </script>
@endsection