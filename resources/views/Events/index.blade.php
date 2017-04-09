@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    <div class="event-container">
        @foreach($meals as $meal)
            <div class="event-item">
                <img src="mealpictures/{{ $meal->meal_picture }}" alt="meal picture">
                <div class="event-description">
                    <div class="event-description-content">
                        <h3 class="event-name">{{$meal->meal_name}}</h3>
                        <h3 class="event-price"> </h3>
                        <button class="btn btn-primary">
                            Maaltijd bekijken
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- DEFAULT EVENT ITEM -->
            <div class="event-item">
                <img src="mealpictures/{{ $meal->meal_picture }}" alt="meal picture">
                <div class="event-description">
                    <div class="event-description-content">
                        <h3 class="event-name">{{$meal->meal_name}}</h3>
                        <h3 class="event-price"> </h3>
                        <button class="btn btn-primary">
                            Maaltijd bekijken
                        </button>
                    </div>
                </div>
            </div>
    </div>
@endsection