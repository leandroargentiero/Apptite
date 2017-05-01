@extends('layouts.master')

@section('banner')

    <div class="eventdetail-wrapper" style="background-image:url('/assets/images/banner-chef.png')">
        <div class="eventdetail-content">
            <h3 class="eventdetail-title">{{ $user->name }}</h3>
        </div>
    </div>

@stop

@section('content')

@stop