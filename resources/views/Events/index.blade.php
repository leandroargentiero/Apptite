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

        <!-- DEFAULT ITEM FOR ADDING EVENT -->
            <div class="event-item">
                <img src="/assets/images/thumbnail-neighbour.jpg" alt="Add meal">
                <div class="event-description">
                    <div class="event-description-content">
                        <h3 class="event-name">Zelf een Apptite event maken?</h3>
                        <button class="btn btn-primary">
                            Word Apptite chef
                        </button>
                    </div>
                </div>
            </div>

            <div style="width: 100%; height: 500px;">
                {!! Mapper::render() !!}
            </div>
    </div>
@endsection