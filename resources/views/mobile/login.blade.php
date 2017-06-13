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
    <div class="row text-center">
        <div class="col-10 offset-1">
            <h1 class="brand-primary mobile-login-title mt-5">Welkom!</h1>
            <h4 class="text-gray mobile-login-desc mt-5">Vul het code van uw bandje in</h4>
            <div class="form-group mt-5">
                <input type="text" name="band_number" class="form-control form-style mobile-login-input-bandnumber text-center" id="band_number" placeholder="Typ hier uw code...">
            </div>
            <button type="button" class="btn btn-login btn-primary mt-5 px-5 py-4">Login</button>
        </div>
    </div>
@endsection

@section('footer')
    <p>footer</p>
@endsection