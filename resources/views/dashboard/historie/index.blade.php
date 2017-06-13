@extends('dashboard.master')

@section('title', 'Historie')

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
                            <span>Patientnummer</span>
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
                        <div>
                            <span>Uitgecheckt</span>
                        </div>
                    </div>
                    <div class="item-col item-col-header item-col-title">
                        <div class="no-overflow">
                            <span>Verwijderen</span>
                        </div>
                    </div>
                </div>
            </li>
            @foreach($patienten as $patient)
                @if($patient->status_id === 4)
                    <li class="item">
                        <div class="item-row pl-0">
                            <div class="item-col item-col-title p-0">
                                @if(is_null($patient->triage_id))
                                    <div class="urgentie white-bg"></div>
                                @else()
                                    <div class="urgentie bg-{!! $patient->triage->slug !!}"></div>
                                @endif
                            </div>
                            <div class="item-col item-col-title">
                                {!! $patient->number !!}
                            </div>
                            <div class="item-col item-col-title">
                                <h4 class="item-title">{!! $patient->first_name . " " . $patient->last_name !!}</h4>
                            </div>
                            <div class="item-col item-col-title">
                                <div>
                                    <i class="fa fa-clock-o"></i> {!! $patient->status->name !!}
                                </div>
                            </div>
                            <div class="item-col item-col-title">
                                <div>
                                    {!! $patient->band_number !!}
                                </div>
                            </div>
                            <div class="item-col item-col-title">
                                <div class="no-overflow">
                                    {!! $patient->checked_out_at !!}
                                </div>
                            </div>
                            <div class="item-col item-col-title">
                                <div class="no-overflow">
                                    {!! Form::model($patient, ['method' => 'DELETE', 'action' => ['Web\HistoryController@destroy',$patient->id], 'id' => 'destroyhistory']) !!}
                                    {!! Form::submit('Verwijderen', array('class' => 'btn btn-danger rounded')) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection