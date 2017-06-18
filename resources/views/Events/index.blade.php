@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    <h3 class="header-title">
        @if(isset($searchCity) && count($eventMeals) > 0)
            We vonden {{count($eventMeals)}} Apptite events in {{ $searchCity }}
        @elseif(isset($searchCity))
            Sorry, we vonden geen events in {{ $searchCity }}. Momenteel zijn we enkel actief in Mechelen.
        @endif
    </h3>

    <div class="event-container animated zoomIn">
        @foreach($eventMeals as $eventMeal)
                <div class="event-card col-sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="card hvr-float-shadow">
                        <a href="/events/{{ $eventMeal->id }}">
                            <img class="card-img-top" src="/mealpictures/{{ $eventMeal->meal_picture }}">
                        </a>
                        <div class="card-block">
                            <figure class="profile">
                                <a href="/profiel/{{ $eventMeal->id }}">
                                    <img src="/avatars/{{ $eventMeal->profilepic }}" class="profile-avatar" alt="">
                                </a>
                            </figure>

                            <div class="meta">
                                <a href="/profiel/{{ $eventMeal->user_id }}">{{ $eventMeal->name }}</a>
                            </div>

                            <h4 class="card-title mt-3">{{ $eventMeal->meal_name }}</h4>
                            <small>€ {{$eventMeal->price}} p.p. </small>
                        </div>
                        <div class="card-footer">
                            <small><i class="fa fa-clock-o" aria-hidden="true"></i> {{  date(' d F, Y', strtotime($eventMeal->event_date)) }}</small>

                            @if($eventMeal->event_places == 0)
                                <h4 class="event-places" style="background-color: #D7263D;">VOLZET</h4>
                            @else
                                <h4 class="event-places">{{$eventMeal->event_places}} plaatsen vrij</h4>
                            @endif
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection