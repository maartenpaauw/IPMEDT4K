@extends('dashboard.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <dashboard-patients :initial-triages="{{ $triage_count }}"></dashboard-patients>
            </div>
        </div>
        <div class="pl-5"></div>
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