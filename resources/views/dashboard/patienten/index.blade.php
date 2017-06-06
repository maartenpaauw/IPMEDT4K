@extends('dashboard.master')

@section('title', 'Patiënten')

@section('content')
    <div class="card items">
        <ul class="item-list striped">
            <li class="item item-list-header hidden-sm-down">
                <div class="item-row pl-0">
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span class="pl-1">Urg</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Gravatar</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Naam</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Status</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Code</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div class="no-overflow">
                            <span>Urgentie Wijzigen</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div class="no-overflow">
                            <span>Uitchecken</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div>
                            <span>Datum</span>
                        </div>
                    </div>
                </div>
            </li>
            <li class="item">
                <div class="item-row pl-0">
                    <div class="item-col item-col-title p-0">
                        <div class="urgentie urg-red">

                        </div>
                    </div>
                    <div class="item-col item-col-title"><img alt="" class="rounded" src="https://avatars3.githubusercontent.com/u/4550875?v=3&s=80"></div>
                    <div class="item-col item-col-title">
                        <h4 class="item-title">Maarten Paauw</h4>
                    </div>
                    <div class="item-col item-col-title">
                        <div>
                            In behandeling
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div>
                            6969
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div class="no-overflow">
                            <a class="btn btn-success rounded" href="">Wijzigen</a>
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div class="no-overflow">
                            <a class="btn btn-danger rounded" href="">Uitchecken</a>
                        </div>
                    </div>
                    <div class="item-col item-col-title">
                        <div class="no-overflow">
                            03-06-2017 - 13:33
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection