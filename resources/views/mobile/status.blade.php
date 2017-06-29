@extends('mobile.master')

@section('title', 'Status van ' . $patient->band_number)

@section('header')
    <!-- Status bar -->
    <mobile-status :patient="{{ $patient }}"></mobile-status>
@endsection

@section('content')
    <!-- Description -->
    <mobile-description :patient="{{ $patient }}"></mobile-description>

    <!-- Button -->
    <mobile-button :patient="{{ $patient }}" href="{{ $compare }}">
        <strong class="text-white">Meer informatie</strong>
        <i class="fa fa-chevron-right fa-pull-right text-white pt-1" />
    </mobile-button>
@endsection