@extends('dashboard.master')

@section('title', 'Profiel')

@section('content')
    @if(Auth::user())
    <div class="patient-create white-bg">
        <div class="row">
            <div class="col-12">
                <div class="form-group mt-4">
                    <label for="name" class="form-label">Naam</label>
                    <input class="form-control form-style pl-2" name="name" type="text" value="{!! Auth::user()->name !!}" id="name" disabled/>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mt-4">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control form-style pl-2" name="email" type="email" value="{!! Auth::user()->email !!}" id="email" disabled/>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mt-4">
                    <label for="created" class="form-label">Aangemaakt</label>
                    <input class="form-control form-style pl-2" name="created" type="text" value="{!! Auth::user()->created_at !!}" id="created" disabled/>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mt-4">
                    <label for="updated" class="form-label">Geüpdatet</label>
                    <input class="form-control form-style pl-2" name="updated" type="text" value="{!! Auth::user()->updated_at !!}" id="updated" disabled/>
                </div>
            </div>
        </div>
    </div>
    @else
        Geen profiel
    @endif
@endsection