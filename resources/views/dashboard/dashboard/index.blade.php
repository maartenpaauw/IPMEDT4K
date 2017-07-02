@extends('dashboard.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="row mr-4">
                <dashboard-fast-check-in href="{{ route('patienten.create', [], true) }}"></dashboard-fast-check-in>
                <dashboard-patients :initial-triages="{{ $triage_count }}"></dashboard-patients>
                <dashboard-last-ten-patients :initial-patients="{{ $latest_patients }}"></dashboard-last-ten-patients>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                <dashboard-waiting-too-long :initial-patients="{{ $patients }}"></dashboard-waiting-too-long>
                <dashboard-no-triage :initial-patients="{{ $patients_without_triage }}"></dashboard-no-triage>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/statistics.js') }}"></script>
@endsection