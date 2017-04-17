@extends('layouts.master')

@section('banner')

    <div class="eventdetail-wrapper" style="background-image:url('/mealpictures/1491731932.jpg')">
        <h3 class="eventdetail-title">{{ $event->meal_name }}</h3>
    </div>

@stop

@section('content')
    <div class="profile-container">

        <!-- SECTION MEALINFO -->
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Maaltijd info</h3></div>
                    <div class="panel-body">

                        <table class="table">


                        </table>

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
                            <li class="city"><h4><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $event->city }}</h4>
                            </li>
                            <li class="member-since"> Apptiter sinds:</li>
                        </ul>
                    </div>
                </div>

                @if($event->id == Auth::user()->id)
                    <a class="cta-toevoegen" href="">Moment wijzigen</a>
                @else
                    <a class="cta-toevoegen" href="">Een plaats reserveren</a>
                @endif

                <div id="map" style="width: 100%; height: 300px;">
                    {!! Mapper::render() !!}
                </div>

            </div>
        </div>

        <div class="row">

            <!-- SECTION REVIEWS -->
            <div class="col-md-8">
                <h2 class="page-header">Reviews</h2>
                <section class="comment-list">
                    <!-- First Comment -->
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="/avatars/avatar.jpg" />
                                <figcaption class="text-center">username</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> Apptiter</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> 22 mei, 2017</time>
                                    </header>
                                    <div class="comment-post">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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