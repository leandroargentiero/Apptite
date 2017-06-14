@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    @if(Session::has('successmessage'))
        <div class="alert alert-success">
            <strong>{{ Session::get('successmessage') }}</strong>
        </div>
    @endif

    @if(count($eventMeals) > 0)
        <h3 class="header-title">Aantal geplande events: {{ count($eventMeals) }}</h3>
        <div class="event-container animated zoomIn">
            @foreach($eventMeals as $eventMeal)
                <div class="event-card col-sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="card hvr-float-shadow">
                        <a href="/events/{{ $eventMeal->id }}">
                            <img class="card-img-top" src="/mealpictures/{{ $eventMeal->meal_picture }}">
                        </a>
                        <div class="card-block">
                            <small><i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{  date(' d F, Y', strtotime($eventMeal->event_date)) }}
                            </small>
                            <h4 class="card-title mt-3">{{ $eventMeal->meal_name }}</h4>
                            <small>Vrije plaatsen: {{ $eventMeal->event_places }}</small>
                        </div>
                        <div class="card-footer">
                            <p>Reservaties:</p>
                            <ul class="list-group">
                                @if(count($reservations) < 1)
                                    <li class="list-group-item">Je hebt nog geen reservaties</li>
                                @endif
                                @foreach($reservations as $reservation)
                                    @if($eventMeal->id == $reservation->event_id)
                                        @if(count($eventMeal->id == $reservation->event_id) > 0)
                                            <li class="list-group-item clearfix">
                                                {{ $reservation->reservation_places }}p
                                                -
                                                <a href="/profiel/{{ $reservation->user_id }}">
                                                    {{ $reservation->name }}
                                                </a>

                                                <form class="form-horizontal" role="form" method="POST"
                                                      action="/reservaties/weiger/{{ $reservation->reservation_id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-sm pull-left" type="submit"><i class="fa fa-trash"></i> Weiger
                                                    </button>
                                                    <input type="hidden" value="{{ $eventMeal->id }}" name="event_id" >
                                                    <input type="hidden" value="{{ $reservation->reservation_places }}" name="reservation_places" >
                                                </form>

                                            </li>
                                        @else
                                            <li class="list-group-item">Je hebt nog geen reservaties</li>
                                        @endif
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h3 class="header-title">Er staan momenteel geen Apptite events gepland.</h3>
    @endif
    <div class="banner-event">
        <a href="/mijnkookboek">
            <div class="banner-event-overlay">
                <h3>Maak een nieuw event aan.</h3>
                <img class="btnAdd hvr-grow" src="/assets/images/plus.png" alt="add-button">
            </div>
        </a>
    </div>
@endsection