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
                            <div class="col-12 p-4 mb-5 white-bg border-light-gray">
                                <div class="row">

                                    <div class="col-12">
                                        <h3 class="h4 dark-blue">
                                            <strong>Leiden,</strong> Nederland
                                        </h3>
                                        <small>
                                            <i class="text-info">Hoogte 0m 52.15 N, 4.49 E&emsp;<span class="blue-dark">|</span>&emsp;Geüpdatet 12 minuten geleden</i>
                                        </small>
                                    </div>

                                    <div class="col-12 mt-5 mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <p class="h1 text-center" style="font-size: 4rem;">
                                                    <i class="wi wi-day-rain mr-3 text-info"></i> <span class="dark-blue">13.5<sup>&deg;c</sup></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 my-2">
                                        <hr>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-0 text-info">
                                                    <i class="wi wi-sunrise fa-2x  m-0 mr-2 align-middle"></i> <span class="align-middle blue-dark">06:54</span>
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0 text-info">
                                                    <i class="wi wi-sunset  fa-2x m-0 mr-2 align-middle"></i> <span class="align-middle blue-dark">20:31</span>
                                                </p>
                                            </div>
                                            <div class="col-5">
                                                <p class="m-0 text-info text-right">
                                                    <i class="wi wi-strong-wind fa-2x m-0 mr-2 align-middle"></i> <span class="align-middle blue-dark">6.1 km/h - ZW</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NU.nl -->
                <div class="row my-5 px-1 py-3 white-bg border-light-gray">

                    <!-- Logo -->
                    <div class="col-1">
                        <img src="{!! asset('images/nu.nl.png') !!}" alt="Nu.nl - Logo" style="height: 50px;">
                    </div>

                    <!-- Feed -->
                    <div class="col align-self-center">

                        <!-- News -->
                        <div class="news">

                            <!-- News item -->
                            <p class="m-0 mr-5 news-item">
                                <strong class="text-info">06:45</strong><span class="dark-blue">&emsp;&mdash;&emsp;</span>Nieuwe advocaat voor verdachte in zaak Everink.
                            </p>

                            <!-- News item -->
                            <p class="m-0 news-item">
                                <strong class="text-info">06:45</strong><span class="dark-blue">&emsp;&mdash;&emsp;</span>Nieuwe advocaat voor verdachte in zaak Everink.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="{!! asset('js/monitor.js') !!}"></script>
    </body>
</html>
