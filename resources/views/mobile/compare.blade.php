@extends('mobile.master')

@section('title', 'Triages vergelijken')

@section('header')
    <!-- Status bar -->
    <mobile-status :patient="{{ $patient }}" :waiting_patients="{{ $waiting_patients }}"></mobile-status>
@endsection

@section('content')
    <!-- Introduction -->
    <mobile-introduction :patient="{{ $patient }}"></mobile-introduction>

    <!-- Compare -->
    <mobile-compare v-for="compare in {{ $patient->triage->comparisons }}" :compare="compare" :key="compare.id"></mobile-compare>

    <!-- Button -->
    <mobile-button :patient="{{ $patient }}" href="{{ $status }}">
        <strong class="text-white">Ga terug</strong>
        <i class="fa fa-chevron-left fa-pull-left text-white pt-1" />
    </mobile-button>
@endsection