@extends('layouts.master')

@section('banner')

    <div class="eventdetail-wrapper" style="background-image:url('/mealpictures/{{ $event->meal_picture }}')">
        <h3 class="eventdetail-title">{{ $event->meal_name }}</h3>
    </div>

@stop

@section('content')
    <div class="profile-container">

        <!-- SECTION MEALINFO -->
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> {{ $event->meal_name }} </h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <img class="pull-left img-rounded" style="width: 100%; height: 100%"
                                 src="/mealpictures/{{ $event->meal_picture }}" alt="">
                        </div>

                        <div class="col-md-6">
                            <h4><i class="fa fa-info" aria-hidden="true"></i> Over gerecht:</h4>
                            <p>{{ $event->description }}</p>

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
                                {{ $event->postalcode}} {{  $event->city }}
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
                            <li class="city"><h4><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $event->city }}
                                </h4>
                            </li>
                            <li class="member-since"> Apptiter
                                sinds: {{  date(' F d, Y', strtotime($event->created_at)) }}</li>
                        </ul>
                    </div>
                </div>

                <!-- CALL TO ACTION BOOK - CHANGE - FULL -->

                <div>
                    @if($event->id == Auth::user()->id)
                        <a class="cta-toevoegen" href="">Moment wijzigen</a>
                    @elseif($event->available_places == 0)
                        <a class="cta-toevoegen" href="">VOLZET</a>
                    @else
                        <a class="cta-toevoegen" href="#" data-toggle="modal" data-target="#modalReservation">Een plaats
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
                <h2 class="page-header">Reacties van andere Apptiters</h2>
                <section class="comment-list">
                    <!-- First Comment -->
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="/avatars/avatar.jpg"/>
                                <figcaption class="text-center">username</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> Apptiter</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i
                                                    class="fa fa-clock-o"></i> 22 mei, 2017
                                        </time>
                                    </header>
                                    <div class="comment-post">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            </div>

        </div>
    </div>
@stop