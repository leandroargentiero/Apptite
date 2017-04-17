@extends('layouts.master')

@section('hero')
    @include('partials.hero')
@stop

@section('content')
    <div class="">
        <h2 style="text-align: center; margin: 0 0 100px 0;">Hoe werkt het?</h2>
        <div class="row" style="margin: 0 0 80px 0;">
            <div class="col-md-6">
                <h2>Zoek naar een Apptite moment</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <button class="btn btn-default">
                    Zoeken momenten
                </button>
            </div>
            <div class="col-md-5 pull-right">
                <div style="width: 100%; height: 300px; background-color: grey"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 pull-left">
                <div style="width: 100%; height: 300px; background-color: grey"></div>
            </div>
            <div class="col-md-6">
                <h2>Word Apptite chef</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <button class="btn btn-default">
                    Word Apptite chef
                </button>
            </div>
        </div>
    </div>
@stop
