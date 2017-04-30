@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    <h3 class="header-title">
        @if(isset($searchCity) && count($eventMeals) > 0)
            {{count($eventMeals)}} aankomende momenten in <br> {{ $searchCity }}
        @elseif(isset($searchCity))
            Sorry, maar we vonden nog geen Apptite events in {{ $searchCity }}.
        @endif
    </h3>

    <div class="event-container">
        @foreach($eventMeals as $eventMeal)
            <div class="event-item">
                <img src="/mealpictures/{{ $eventMeal->meal_picture }}" alt="meal picture">
                <h4 class="event-price"><span>€ {{$eventMeal->price}}</span> p.p.</h4>

                @if($eventMeal->event_places == 0)
                    <h4 class="event-places" style="background-color: red;">VOLZET</h4>
                @else
                    <h4 class="event-places">Nog {{$eventMeal->event_places}} plaatsen vrij</h4>
                @endif


                <div class="event-title">
                    <h3><a href="/events/{{ $eventMeal->id }}">{{ $eventMeal->meal_name }}</a></h3>
                </div>
                <div class="event-description">
                    <div class="event-description-content">
                        <a href="#"><img class="user-avatar" src="/avatars/{{ $eventMeal->profilepic }}"
                                         alt="user avatar"></a>
                        <h3 class="user-name"><a href="#">{{ $eventMeal->name }}</a></h3>
                        <h4 class="user-location"><i class="fa fa-map-marker"
                                                     aria-hidden="true"></i> {{$eventMeal->address}}</h4>
                    </div>
                </div>
            </div>
            @endforeach

                    <!-- DEFAULT ITEM FOR ADDING EVENT -->
            <div class="event-item">
                <img src="/assets/images/thumbnail-neighbour.jpg" alt="Add meal">
            </div>
    </div>
@endsection