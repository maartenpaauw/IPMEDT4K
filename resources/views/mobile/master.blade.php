<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <title>Krankenhaus Krak - @yield('title')</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/mobile.css') }}" rel="stylesheet">
    <meta content="{{ csrf_token() }}" name="csrf-token">
</head>

<body>
<div class="container-fluid">
    @yield('header')
    @yield('content')
    @yield('footer')
</div>
<script src="{{mix('js/app.js')}}">
</script>
</body>
</html>