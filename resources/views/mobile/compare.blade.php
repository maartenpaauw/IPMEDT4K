@extends('mobile.master')

@section('title', 'Triages vergelijken')

@section('header')
    <!-- Status bar -->
    <mobile-status :initial-patient="{{ $patient }}" initial-waiting-patients="{{ $waiting_patients }}"></mobile-status>
@endsection

@section('content')
    <!-- Introduction -->
    <mobile-introduction :initial-patient="{{ $patient }}"></mobile-introduction>

    <!-- Compare -->
    <mobile-comparisons :initial-patient="{{ $patient }}"></mobile-comparisons>


    <!-- Button -->
    <mobile-button :initial-patient="{{ $patient }}" href="{{ $status }}">
        <strong class="text-white">Ga terug</strong>
        <i class="fa fa-chevron-left fa-pull-left text-white pt-1"></i>
    </mobile-button>

    <!-- Logout -->
    <mobile-logout href="{{ route('patient.login') }}"></mobile-logout>
@endsection