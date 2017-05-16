@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')

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
                        <small>Aantal plaatsen: {{ $eventMeal->event_places }}</small>
                    </div>
                    <div class="card-footer">
                        <p>Reservaties: <small>({{ count($reservations) }})</small></p>
                        <ul class="list-group">
                            @foreach($reservations as $reservation)
                                @if($eventMeal->id == $reservation->event_id)
                                    <li class="list-group-item">
                                        <a href="/profiel/{{ $reservation->user_id }}">
                                            {{ $reservation->name }}
                                        </a>
                                        - {{ $reservation->reservation_places }}p
                                    </li>
                                @else
                                    Sorry, maar je hebt nog geen reservaties.
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection