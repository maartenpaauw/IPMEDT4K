<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{!! mix('css/app.css') !!}">
        <link rel="stylesheet" href="{!! mix('css/monitor.css') !!}">

        <title>Krankenhaus Krak&emsp;&mdash;&emsp;Monitor</title>

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

        <meta name="csrf-token" content="{!! csrf_token() !!}">
    </head>

    <body class="light-gray-bg">

        <!-- Vue js wrapper -->
        <div id="app">

            <!-- Menu -->
            <monitor-header logo="{!! asset('images/logo.png') !!}"></monitor-header>

            <!-- Container -->
            <div class="container-fluid mx-5">

                <!-- Main -->
                <div class="row pt-5">

                    <div class="col-6 mr-5">
                        <div class="row">

                            <!-- Waiting timers -->
                            <monitor-patients :initial-patients="{{ $patients }}" track="{{ asset('sounds/sound_2.mp3') }}"></monitor-patients>

                            <!-- Triage counter -->
                            <monitor-triage-counter :initial-triages="{{ $triage_count }}"></monitor-triage-counter>
                        </div>
                    </div>

                    <!-- Legenda -->
                    <div class="col">

                        <div class="row">

                            <!-- Triage explanation -->
                            <monitor-triage :triages="{{ $triages }}"></monitor-triage>

                            <!-- Weather -->
                            <monitor-weather></monitor-weather>

                            <!-- Go to site bar -->
                            <monitor-site url="{{ str_replace("http://", "", route('patient.login')) }}"></monitor-site>
                        </div>
                    </div>
                </div>

                <!-- NU.nl -->
                <monitor-news logo="{{ asset('images/nu.nl.png') }}"></monitor-news>
            </div>

        </div>

        <script type="text/javascript" src="{{ asset('js/monitor.js') }}"></script>
    </body>
</html>
