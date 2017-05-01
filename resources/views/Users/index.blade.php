@extends('layouts.master')

@section('banner')

    <div class="eventdetail-wrapper" style="background-image:url('/assets/images/banner-chef.png')">
        <div class="eventdetail-content">
            <h3 class="eventdetail-title">{{ $user->name }}</h3>
        </div>
    </div>

    @stop

    @section('content')
            <!-- USER INFO & DETAILS -->
    <div class="row">
        <!-- USERS INFORMATION -->
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="page-header">Over deze Apptiter</h4>
                    <p>{{ $user->description }}</p>

                    <h4 class="page-header">Totaal aantal georganiseerde events</h4>
                    @if(count($totalevents) > 0)
                        <p>{{ count($totalevents) }}</p>
                    @else
                        <p>Deze Apptiter heeft nog geen events georganiseerd.</p>
                    @endif

                    <h4 class="page-header">Toekomstige events</h4>
                    @if(count($comingevents) > 0)
                        @foreach($comingevents as $comingevent)
                            <div class="list-group">
                                <a href="/events/{{ $comingevent->id }}"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $comingevent->meal_name }}</h5>
                                        <small class="text-muted">{{ $comingevent->event_date }}</small>
                                        <p>Vrije plaatsen: {{ $comingevent->event_places }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p>Momenteel heeft deze Apptiter geen events gepland.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 user-detail">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img class="user-image" src="/avatars/{{ $user->profilepic }}" alt="">
                    <div class="col-md-12 user-info">
                        <h3 class="user-name">{{ $user->name }}</h3>
                        <p class="user-date">Apptiter sinds: {{  date(' d F, Y', strtotime($user->created_at)) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- GOOGLE MAPS WITH USER'S LOCATION -->
        <div class="col-md-12">
            <h2 class="page-header">Locatie</h2>

            <div id="map" style="width: 100%; height: 300px;">
                {!! Mapper::render() !!}
            </div>
        </div>
    </div>

    <!-- SECTION REVIEWS -->
    <div class="row">
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
                                                class="fa fa-clock-o"></i>{{  date(' d F, Y', strtotime($review->created_at)) }}
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
                    <p>{{ $user->name }} heeft nog geen reviews mogen ontvangen.</p>
                @endif

            </section>
        </div>
    </div>

    @if($user->id != Auth::user()->id)
    <!-- SECTION ADD REVIEW -->
    <div class="col-md-8" style="padding: 0;">
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-custom">
                <div class="panel-title">
                    Laat een review achter
                </div>
            </div>
            <div class="panel-body">
                <form action="/review/{{ $user->id }}" method="POST" class="form-horizontal"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                            <!-- Meal Description -->
                    <div class="col-md-12">
                        <div class="form-group">
                                    <textarea name="review" id="review" cols="40" rows="5"
                                              class="form-control review-text" value="{{old('review')}}" placeholder="Schrijf hier jouw review
                                        "></textarea>
                            <input name="event_id" type="hidden" value="">
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
@stop