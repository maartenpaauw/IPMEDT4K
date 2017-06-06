<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{!! mix('css/app.css') !!}">
        <link rel="stylesheet" href="{!! mix('css/monitor.css') !!}">

        <title>Monitor</title>

        <meta name="csrf-token" content="{!! csrf_token() !!}">
    </head>

    <body class="light-gray-bg">

        <!-- Vue js wrapper -->
        <div id="app">

            <!-- Menu -->
            <monitor-header logo="{!! asset('images/logo.png') !!}"></monitor-header>

            <!-- Container -->
            <div class="container">

                <!-- Title -->
                <div class="row pt-5">
                    <div class="col-12 px-0">
                        <h2 class="h1 blue-dark">Wachtende patiënten</h2>
                    </div>
                </div>

                <!-- Main -->
                <div class="row pt-5">

                    <!-- Waiting timers -->
                    <monitor-patients></monitor-patients>

                    <!-- Legenda -->
                    <div class="col">

                        <!-- Margin top -->
                        <div class="row py-3">
                            <div class="col">
                                <p class="mb-1">&nbsp;</p>
                            </div>
                        </div>

                        <div class="row">

                            <!-- Triage explanation -->
                            <monitor-triage></monitor-triage>

                            <!-- Triage counter -->
                            <monitor-triage-counter></monitor-triage-counter>

                            <!-- Weather -->
                            <monitor-weather></monitor-weather>
                        </div>
                    </div>
                </div>

                <!-- NU.nl -->
                <monitor-news logo="{!! asset('images/nu.nl.png') !!}"></monitor-news>
            </div>

        </div>

        <script type="text/javascript" src="{!! asset('js/monitor.js') !!}"></script>
    </body>
</html>
