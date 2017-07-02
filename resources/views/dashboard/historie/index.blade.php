@extends('dashboard.master')

@section('title', 'Zoeken')

@section('content')
    <div class="patient-search white-bg">
        <div class="row">
            <div class="col-12">
                <input type="search" class="form-control form-style pl-2" name="searchPatient" id="searchPatient" placeholder="Type hier uw zoekterm..." />
            </div>
        </div>
    </div>
@endsection

@section('titleExtra', 'Historie')

@section('contentExtra')
    <table id="historyTable" class="table tablesorter table-striped bg-white">
        <thead>
        <tr>
            <th class="th-clickable border-right-1">Urg <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Patientnummer <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Naam <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Status <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Code <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th class="th-clickable border-right-1">Uitgecheckt <i class="fa fa-sort fa-pull-right pt-1" aria-hidden="true"></i></th>
            <th>Verwijderen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patienten as $patient)
            @if($patient->status_id === 4)
                <tr class="tableResults">
                    <td class="p-0">
                        @if(is_null($patient->triage_id))
                            <div class="urgentie white-bg"></div>
                            <div class="invisible displaynone">
                                0
                            </div>
                        @else()
                            <div class="urgentie bg-{!! $patient->triage->slug !!}"></div>
                            <div class="invisible displaynone">
                                {!! $patient->triage_id !!}
                            </div>
                        @endif
                    </td>
                    <td class="pt-4">
                        {!! $patient->number !!}
                    </td>
                    <td class="pt-4">
                        <b>{!! $patient->first_name . " " . $patient->last_name !!}</b>
                    </td>
                    <td class="pt-4">
                        <i class="fa fa-clock-o"></i> {!! $patient->status->name !!}
                    </td>
                    <td class="pt-4">
                        {!! $patient->band_number !!}
                    </td>
                    <td class="pt-4">
                        <div class="date">{!! $patient->checked_out_at !!}</div>
                    </td>
                    <td>
                        {!! Form::model($patient, ['method' => 'DELETE', 'action' => ['Web\HistoryController@destroy',$patient->id], 'id' => 'destroyhistory']) !!}
                        {!! Form::close() !!}
                        <button class="btn btn-danger rounded delete-from-history">Verwijderen</button>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection