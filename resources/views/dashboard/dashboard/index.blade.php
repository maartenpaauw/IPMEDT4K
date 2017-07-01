@extends('dashboard.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <dashboard-fast-check-in href="{{ route('patienten.create', [], true) }}"></dashboard-fast-check-in>
                <dashboard-patients :initial-triages="{{ $triage_count }}"></dashboard-patients>
                <dashboard-last-ten-patients :initial-patients="{{ $latest_patients }}"></dashboard-last-ten-patients>
            </div>
        </div>
        <span class="pl-5 hidden-lg-down"></span>
        <div class="col">
            <div class="row">
                <dashboard-waiting-too-long :initial-patients="{{ $patients }}"></dashboard-waiting-too-long>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/statistics.js') }}"></script>
@endsection