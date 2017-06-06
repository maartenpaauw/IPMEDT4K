<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <title>Krankenhaus Krak - Login</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ mix('css/login.css') }}" rel="stylesheet">
    <meta content="{{ csrf_token() }}" name="csrf-token">
</head>
<body>
<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <div class="logo">
                        <img alt="" class="logo-img" src="{{asset('images/krankenhaus_krak_rgb_1920x1080.png')}}">
                    </div>
                </h1>
            </header>
            <div class="auth-content">
                <h3 class="text-center mb-5">Login</h3>
                {!! Form::open(array('url' => 'login')) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'Email', array('for' => 'email')) !!}
                        {!! Form::text('email', '', array('class' => 'form-control underlined', 'placeholder' => 'info@example.com')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password', array('for' => 'password')) !!}
                        {!! Form::password('password', array('class' => 'form-control underlined', 'placeholder' => '*******')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Login', array('class' => 'btn btn-block btn-primary')) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</body>
</html>