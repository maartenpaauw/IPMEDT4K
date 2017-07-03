<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <title>Krankenhaus Krak&emsp;&mdash;&emsp;@yield('title')</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('faviconms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/dashboard.css') }}" id="theme-style" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
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
                @if(Auth::user() && Request::url() !== route('dashboard'))
                <ul class="nav-profile">
                    <li class="profile dropdown">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                            <div class="img" style="background-image: url('{!! "https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) !!}')"></div><span class="name"> {!! Auth::user()->name !!}</span></a>
                        <div aria-labelledby="dropdownMenu1" class="dropdown-menu profile-dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/profiel') }}"><i class="fa fa-user icon"></i> Profiel</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-power-off icon"></i> Uitloggen</a>
                        </div>
                    </li>
                </ul>
                @endif
            </div>
        </header>
        <div id="loader-wrapper">
            <div id="loader"></div>

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div>
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
        @if ($errors->any())
            <div class="row mt-5 mr-2" style="margin-top: 5rem !important;">
                <div class="col-6 offset-6">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="m-0 p-0">
                        @foreach ($errors->all() as $error)
                            <li class="error-li"><strong>Oeps!</strong> {{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @if (View::hasSection('title'))
            <article class="content items-list-page pb-0">
                <div class="title-search-block">
                    <div class="title-block">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="title">@yield('title')</h3>
                            </div>
                            @if(Request::url() === route('historie'))
                                <div class="col-6">
                                    <button class="btn btn-primary pull-right" id="hideSearchHistory">Verberg</button>
                                </div>
                            @endif
                            @if(Request::url() === route('patienten.index'))
                                <div class="col-6">
                                    <button class="btn btn-primary pull-right" id="hideIncheck">Verberg</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    @yield('content')
                </div>
            </article>
        @endif
        @if(View::hasSection('titleExtra'))
            <article class="contentExtra items-list-page pb-0">
                <div class="title-search-block">
                    <div class="title-block">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="title">@yield('titleExtra')</h3>
                            </div>
                            @if(Request::url() === route('patienten.index'))
                                <div class="col-6">
                                    <button class="btn btn-primary pull-right" id="hideSearch">Verberg</button>
                                </div>
                            @endif
                            @if(Request::url() === route('historie'))
                                <div class="col-6">
                                    <button class="btn btn-primary pull-right" id="hideHistory">Verberg</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    @yield('contentExtra')
                </div>
            </article>
        @endif
        @if(View::hasSection('titleExtra2'))
        <article class="contentExtra items-list-page @if(Request::url() === route('dashboard')){{ "pt-5" }}@endif">
            <div class="title-search-block">
                <div class="title-block">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="title">@yield('titleExtra2')</h3>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary pull-right" id="hidePatients">Verberg</button>
                        </div>
                    </div>
                </div>
                @yield('contentExtra2')
            </div>
        </article>
        @endif
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
@yield('scripts')
@include('sweet::alert')
</body>
</html>