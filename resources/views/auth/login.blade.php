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
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Email</label>
                        <input id="email" type="email" class="form-control underlined" name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Wachtwoord</label>
                        <input id="password" type="password" class="form-control underlined" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Onthoud mij
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>