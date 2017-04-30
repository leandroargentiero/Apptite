@extends('layouts.master')

@section('banner')

    <div class="eventdetail-wrapper" style="background-image:url('/kitchenpictures/{{ $event->user_kitchen }}')">
        <div class="eventdetail-content">
            <h3 class="eventdetail-title">{{ $event->meal_name }}</h3>
        </div>
    </div>

@stop

@section('content')

    @if(Session::has('successmessage'))
        <div class="alert alert-success">
            <strong>{{ Session::get('successmessage') }}</strong>
        </div>
    @elseif (count($errors) > 0)
        <div class="alert alert-danger">
            <p>Woops! Er ging iets mis:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

                <!-- EDIT EVENT MODAL -->
        @include('Modals.modalEditEvent')

        <div class="profile-container">
            <!-- SECTION MEALINFO -->
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-custom">
                            <div class="panel-title">
                                {{ $event->meal_name }}
                                @if( $event->id == Auth::user()->id )
                                    <a href="#" data-toggle="modal"
                                       data-target="#modalEditEvent">
                                        <i class="fa fa-cog pull-right" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6">
                                <img class="pull-left img-rounded" style="width: 100%; height: 100%"
                                     src="/mealpictures/{{ $event->meal_picture }}" alt="">
                            </div>

                            <div class="col-md-6">
                                <h4><i class="fa fa-info" aria-hidden="true"></i> Over gerecht:</h4>
                                <p>{{ $event->meal_description }}</p>

                                <h4><i class="fa fa-money" aria-hidden="true"></i> Prijs:</h4>
                                <p>€ {{ $event->price }} p.p.</p>

                                <h4><i class="fa fa-wheelchair" aria-hidden="true"></i> Aantal vrije plaatsen:</h4>
                                <p>{{ $event->event_places }}</p>

                                <h4><i class="fa fa-globe" aria-hidden="true"></i> Keuken:</h4>
                                <p>{{ $event->kitchen }}</p>

                                <h4><i class="fa fa-calendar" aria-hidden="true"></i> Wanneer:</h4>
                                <p>{{  date(' F d, Y', strtotime($event->event_date)) }}</p>

                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Locatie:</h4>
                                <p>{{ $event->address }} </br>
                                </p>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- SECTION USER INFO -->
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="profile-header">
                            <ul>
                                <li class="user-image">
                                    <img class="user-avatar" src="/avatars/{{ $event->profilepic }}" alt="user avatar">
                                </li>
                                <li class="username"><h3>{{ $event->name }}</h3></li>
                                <li class="city"><p><i class="fa fa-map-marker"
                                                        aria-hidden="true"></i> {{ $event->address }}
                                    </p>
                                </li>
                                <li class="member-since"> Apptiter
                                    sinds: {{  date(' d F, Y', strtotime($event->created_at)) }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- CALL TO ACTION BOOK - CHANGE - FULL -->
                    <div>
                        @if($event->id == Auth::user()->id)
                            <a class="cta-toevoegen" href="#" data-toggle="modal"
                               data-target="#modalEditEvent">Moment wijzigen</a>
                        @elseif($event->event_places == 0)

                        @else
                            <a class="cta-toevoegen" href="#" data-toggle="modal" data-target="#modalReservation">Een
                                plaats
                                reserveren</a>
                        @endif

                        @include('Modals.modalReservation')
                    </div>

                    <!-- GOOGLE MAPS WITH USER'S LOCATION -->
                    <div id="map" style="width: 100%; height: 300px;">
                        {!! Mapper::render() !!}
                    </div>

                </div>
            </div>

            <div class="row">

                <!-- SECTION REVIEWS -->
                <div class="col-md-8">
                    <h2 class="page-header">Reviews van andere Apptiters</h2>
                    <section class="comment-list">
                        @if(count($reviews) >= 1)
                        @foreach($reviews as $review)
                                <!-- REVIEW ARTICLE -->
                        <article class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <figure class="thumbnail">
                                    <img class="img-responsive" src="/avatars/{{ $review->profilepic }}"/>
                                </figure>
                            </div>
                            <div class="col-md-10 col-sm-10">
                                <div class="panel panel-default arrow left">
                                    <div class="panel-body">
                                        <header class="text-left">
                                            <div class="comment-user"><i class="fa fa-user"></i> {{ $review->name }}</div>
                                            <time class="comment-date" datetime="16-12-2014 01:05"><i
                                                        class="fa fa-clock-o"></i> {{  date(' d F, Y', strtotime($review->created_at)) }}
                                            </time>
                                        </header>
                                        <div class="comment-post">
                                            <p>
                                               {{ $review->review_description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        @else
                            <p>{{ $event->name }} heeft nog geen reviews mogen ontvangen.</p>
                        @endif
                    </section>
                </div>
            </div>

            @if($event->id != Auth::user()->id)
            <!-- SECTION ADD REVIEW -->
            <div class="col-md-8" style="padding: 0;">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-custom">
                        <div class="panel-title">
                            Laat een review achter
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="/review/{{ $event->id }}" method="POST" class="form-horizontal"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                                    <!-- Meal Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="review" id="review" cols="40" rows="5"
                                              class="form-control review-text" value="{{old('review')}}" placeholder="Schrijf hier jouw review
                                        "></textarea>
                                    <input name="event_id" type="hidden" value="{{ $eventID }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default pull-right">PLAATSEN</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
@stop