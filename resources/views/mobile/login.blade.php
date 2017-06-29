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
    <div class="row text-center mt-3 mb-5">
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