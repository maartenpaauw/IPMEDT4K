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
    <link href="{{ mix('css/dashboard.css') }}" id="theme-style" rel="stylesheet">
    <meta content="{{ csrf_token() }}" name="csrf-token">
</head>
<body>
<div class="main-wrapper">
    <div class="app" id="app">
        <header class="header">
            <div class="header-block header-block-collapse hidden-lg-up">
                <button class="collapse-btn" id="sidebar-collapse-btn"><i class="fa fa-bars"></i></button>
            </div>
            <div class="header-block header-block-search hidden-sm-down"></div>
            <div class="header-block">
                <a class="btn btn-primary" href="{!! route('patienten.create') !!}"><i class="fa fa-plus"></i> <span>Inchecken</span></a>
            </div>
            <div class="header-block header-block-nav">
                <ul class="nav-profile">
                    <li class="profile dropdown">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                            <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/4550875?v=3&s=40')"></div><span class="name">@if(Auth::user()) {!! Auth::user()->name !!} @else Undefined @endif</span></a>
                        <div aria-labelledby="dropdownMenu1" class="dropdown-menu profile-dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fa fa-user icon"></i> Profiel</a> <a class="dropdown-item" href="#"><i class="fa fa-gear icon"></i> instellingen</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-power-off icon"></i> Loguit</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand"><img alt="" src="{{asset('images/krankenhaus-krak-logo.png')}}"></div>
                </div>
                <nav class="menu">
                    <ul class="nav metismenu" id="sidebar-menu">
                        <li {{ (Request::is('dashboard') ? 'class=active' : '') }}>
                            <a href="{!! route('dashboard') !!}"><i class="fa fa-home brand-primary"></i> Dashboard</a>
                        </li>
                        <hr class="menu-hr p-0 m-0">
                        <li {{ (Request::is('patienten') ? 'class=active' : '') }}>
                            <a href="{!! route('patienten.index') !!}"><i class="fa fa-users brand-primary"></i> Patiënten </a>
                        </li>
                        <hr class="menu-hr p-0 m-0">
                        <li {{ (Request::is('historie') ? 'class=active' : '') }}>
                            <a href="{!! route('historie') !!}"><i class="fa fa-history brand-primary"></i> Historie </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <footer class="sidebar-footer"></footer>
        </aside>
        <div class="sidebar-overlay" id="sidebar-overlay"></div>
        @if (View::hasSection('titleExtra'))
            <article class="content items-list-page pb-0">
                <div class="title-search-block">
                    <div class="title-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title">@yield('titleExtra')</h3>
                            </div>
                        </div>
                    </div>
                    @yield('contentExtra')
                </div>
            </article>
        @endif
        <article class="content items-list-page">
            <div class="title-search-block">
                <div class="title-block">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="title">@yield('title')</h3>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </article>
        <footer class="footer">
            <div class="footer-block author">
                <ul>
                    <li>Gemaakt door: <a href="http://www.krankenhauskrak.nl">Krankenhauskrak</a>
                    </li>
                    <li>
                        <a href="https://www.hsleiden.nl/">IPMEDT4K</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</div>
<script src="{{mix('js/dashboard.js')}}">
</script>
@yield('parsley')
@include('sweet::alert')
</body>
</html>