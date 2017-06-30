@extends('mobile.master')

@section('title', 'Login Mobile')

@section('header')
    <div class="row blue-dark-bg">
        <div class="col-12">
            <img class="brand d-block mx-auto" src="{{asset('images/logo.png')}}" alt="Krankenhaus Krak - logo">
        </div>
    </div>
@endsection

@section('content')

    @if(session('not_found'))
        <div class="row mt-5">
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    <strong>Oeps!</strong> Deze patiënt is niet gevonden...
                </div>
            </div>
        </div>
    @endif

    <div class="row text-center mb-5">
        <div class="col-10 offset-1">
            <h1 class="brand-primary mobile-login-title mt-5">Welkom!</h1>
            <h4 class="text-gray mobile-login-desc mt-4">Vul hieronder het code op uw bandje in.</h4>
            <mobile-login></mobile-login>
        </div>
    </div>
@endsection

{{--@section('footer')--}}
    {{--<p>footer</p>--}}
{{--@endsection--}}