<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/monitor.css') }}">

        <title>Monitor</title>
    </head>

    <body class="bg-lightgray">

        <!-- Menu -->
        <div class="container-fluid">
            <div class="row bg-primary py-4 px-5">
                <div class="col-2 align-self-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Krankenhaus Krak - Logo" width="150px">
                </div>
                <div class="col text-center text-white align-self-center">
                    <h1 class="m-0 text-uppercase">Wacht indicatie</h1>
                </div>
                <div class="col-2 text-right text-white align-self-center">
                    <h4>
                        <i class="fa fa-calendar"></i> 25-05-2017
                    </h4>
                    <h4>
                        <i class="fa fa-clock-o"></i> 13:37
                    </h4>
                </div>
            </div>
        </div>

        <!-- Container -->
        <div class="container">

            <!-- Title -->
            <div class="row pt-5">
                <div class="col-12 px-0">
                    <h2 class="h1 text-primary">Wachtende patiënten</h2>
                </div>
            </div>

            <!-- Main -->
            <div class="row pt-5">

                <!-- Waiting timers -->
                <div class="col-6 mr-5">

                    <!-- Labels -->
                    <div class="row py-3">

                        <!-- Urgency -->
                        <div class="col-1 align-self-center">
                            <p class="mb-1 text-muted">Urg</p>
                        </div>

                        <!-- Code -->
                        <div class="col ml-3 align-self-center">
                            <p class="mb-1 text-muted">Code</p>
                        </div>

                        <!-- Status -->
                        <div class="col align-self-center">
                            <p class="mb-1 text-muted">Status</p>
                        </div>
                    </div>

                    <!-- Waiting patient -->
                    <div class="row bg-white border-lightgray border-bottom-0">

                        <!-- Urgency -->
                        <div class="col-1 py-5 bg-danger"></div>

                        <!-- Code -->
                        <div class="col align-self-center ml-3">
                            <h4 class="h1 m-0 text-primary">56934</h4>
                        </div>

                        <!-- Status -->
                        <div class="col align-self-center">
                            <p class="m-0 text-success">
                                <span class="fa fa-clock-o"></span> <strong>In behandeling</strong>
                            </p>
                        </div>
                    </div>

                    <!-- Waiting patient -->
                    <div class="row bg-white border-lightgray border-bottom-0">

                        <!-- Urgency -->
                        <div class="col-1 py-5 bg-warning"></div>

                        <!-- Code -->
                        <div class="col align-self-center ml-3">
                            <h4 class="h1 m-0 text-primary">56934</h4>
                        </div>

                        <!-- Status -->
                        <div class="col align-self-center">
                            <p class="m-0 text-muted">
                                <span class="fa fa-clock-o"></span> Wachten
                            </p>
                        </div>
                    </div>

                    <!-- Waiting patient -->
                    <div class="row bg-white border-lightgray border-bottom-0">

                        <!-- Urgency -->
                        <div class="col-1 py-5 bg-yellow"></div>

                        <!-- Code -->
                        <div class="col align-self-center ml-3">
                            <h4 class="h1 m-0 text-primary">56934</h4>
                        </div>

                        <!-- Status -->
                        <div class="col align-self-center">
                            <p class="m-0 text-muted">
                                <span class="fa fa-clock-o"></span> Wachten
                            </p>
                        </div>
                    </div>

                    <!-- Waiting patient -->
                    <div class="row bg-white border-lightgray border-bottom-0">

                        <!-- Urgency -->
                        <div class="col-1 py-5 bg-success"></div>

                        <!-- Code -->
                        <div class="col align-self-center ml-3">
                            <h4 class="h1 m-0 text-primary">56934</h4>
                        </div>

                        <!-- Status -->
                        <div class="col align-self-center">
                            <p class="m-0 text-muted">
                                <span class="fa fa-clock-o"></span> Wachten
                            </p>
                        </div>
                    </div>

                    <!-- Waiting patient -->
                    <div class="row bg-white border-lightgray">

                        <!-- Urgency -->
                        <div class="col-1 py-5 bg-info"></div>

                        <!-- Code -->
                        <div class="col align-self-center ml-3">
                            <h4 class="h1 m-0 text-primary">56934</h4>
                        </div>

                        <!-- Status -->
                        <div class="col align-self-center">
                            <p class="m-0 text-muted">
                                <span class="fa fa-clock-o"></span> Wachten
                            </p>
                        </div>
                    </div>
                </div>

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
                        <div class="col-12 p-4 mb-5 bg-white border-lightgray">

                            <div class="row">

                                <!-- Label -->
                                <div class="col-4 align-self-center">
                                    <h3 class="h4 text-primary">Triage</h3>
                                </div>

                                <!-- Triage -->
                                <div class="col">

                                    <div class="row">

                                        <!-- Triage - Onmiddelijk -->
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-2 badge badge-danger d-block border-radius-0"></div>
                                                <div class="col">
                                                    <span class="text-muted">Onmiddelijk</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Triage - Hoog urgent -->
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-2 badge badge-warning d-block border-radius-0"></div>
                                                <div class="col">
                                                    <span class="text-muted">Hoog urgent</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Triage - Urgent -->
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-2 badge badge-yellow d-block border-radius-0"></div>
                                                <div class="col">
                                                    <span class="text-muted">Urgent</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Triage - Urgent -->
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-2 badge badge-success d-block border-radius-0"></div>
                                                <div class="col">
                                                    <span class="text-muted">Standaard</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Triage - Urgent -->
                                        <div class="col-6 mb-2">
                                            <div class="row">
                                                <div class="col-2 badge badge-info d-block border-radius-0"></div>
                                                <div class="col">
                                                    <span class="text-muted">Niet urgent</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Triage counter -->
                        <div class="col-12 p-4 mb-5 bg-white border-lightgray">

                            <div class="row">

                                <!-- Label -->
                                <div class="col-4 align-self-center">
                                    <h3 class="h4 m-0 text-primary">Patiënten</h3>
                                </div>

                                <div class="col align-self-center pl-0">

                                    <div class="rounded-circle text-center text-white circle float-left mr-1 bg-danger">
                                        <span class="m-auto h4">1</span>
                                    </div>
                                    <div class="rounded-circle text-center text-white circle float-left mr-1 bg-warning">
                                        <span class="m-auto h4">2</span>
                                    </div>
                                    <div class="rounded-circle text-center text-white circle float-left mr-1 bg-yellow">
                                        <span class="m-auto h4">3</span>
                                    </div>
                                    <div class="rounded-circle text-center text-white circle float-left mr-1 bg-success">
                                        <span class="m-auto h4">4</span>
                                    </div>
                                    <div class="rounded-circle text-center text-white circle float-left mr-1 bg-info">
                                        <span class="m-auto h4">5</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Weather -->
                        <div class="col-12 p-4 mb-5 bg-white border-lightgray">
                            <div class="row">

                                <div class="col-12">
                                    <h3 class="h4 text-primary">
                                        <strong>Leiden,</strong> Nederland
                                    </h3>
                                    <p>
                                        <i class="text-info">Hoogte 0m 52.15 N, 4.49 E | Geupdate 12 minuten geleden</i>
                                    </p>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            icon
                                        </div>
                                        <div class="col">
                                            tempratuur
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            Neerslag
                                        </div>
                                        <div class="col">
                                            Wind
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- NU.nl -->
            <div class="row my-5 px-1 py-3 bg-white border-lightgray">

                <!-- Logo -->
                <div class="col-1">
                    <img src="{{ asset('images/nu.nl.png') }}" alt="Nu.nl - Logo" style="height: 50px;">
                </div>

                <!-- Feed -->
                <div class="col align-self-center">

                    <!-- News item -->
                    <p class="m-0">
                        <strong class="text-info">06:45</strong>&emsp;<span class="text-primary">&mdash;&emsp;Nieuwe advocaat voor verdachte in zaak Everink.</span>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
