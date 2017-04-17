@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    <h3 class="header-title">Er zijn {{count($eventMeals)}} aankomende momenten in </br> Mechelen</h3>

    <div class="event-container">
        @foreach($eventMeals as $eventMeal)
            <div class="event-item">
                <img src="mealpictures/{{ $eventMeal->meal_picture }}" alt="meal picture">
                <h4 class="event-price"><span>€ {{$eventMeal->price}}</span> p.p.</h4>
                <h4 class="event-places">Nog {{$eventMeal->available_places}} plaatsen vrij</h4>
                <div class="event-title">
                    <h3><a href="/events/{{ $eventMeal->id }}">{{ $eventMeal->meal_name }}</a></h3>
                </div>
                <div class="event-description">
                    <div class="event-description-content">
                        <a href="#"><img class="user-avatar" src="avatars/{{ $eventMeal->profilepic }}"
                                         alt="user avatar"></a>
                        <h3 class="user-name"><a href="#">{{ $eventMeal->name }}</a></h3>
                        <h4 class="user-location"><i class="fa fa-map-marker"
                                                     aria-hidden="true"></i> {{$eventMeal->city}}</h4>
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