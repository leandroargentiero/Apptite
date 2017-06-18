@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    <div class="profile-container">

        <!-- FEEDBACK MESSAGES -->
        <div class="col-md-12">
            @if(Session::has('successmessage'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('successmessage') }}</strong>
                </div>
            @elseif(Session::has('errormessage'))
                <div class="alert alert-danger">
                    <strong>{{ Session::get('errormessage') }}</strong>
                </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="profile-header">
                    <ul>
                        <li class="user-image">
                            <img class="user-avatar" src="avatars/{{ $user->profilepic }}" alt="user avatar">
                        </li>
                        <li class="username"><h3>{{ $user->name }}</h3></li>
                        <li class="city"><p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user->address }}</p>
                        </li>
                        <li class="member-since"> Apptiter
                            sinds:{{ date(' F d, Y', strtotime($user->created_at)) }}</li>
                    </ul>
                </div>
            </div>

            <a class="cta-toevoegen" href="{{ url('/maaltijden/aanmaken') }}">Een nieuw gerecht toevoegen</a>

        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">

                    <table class="table">


                        <form class="form-horizontal profile-information" role="form" method="POST"
                              action="/mijnprofiel/update" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <tr>
                                <!-- CHANGE AVATAR -->
                                <div class="form-group col-md-6">
                                    <label for="useravatar" class="control-label">Wijzig profielfoto</label>
                                    <input name="useravatar" id="useravatar" type="file"
                                           value="{{old('useravatar')}}">
                                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                                </div>
                                <!-- CHANGE USER'S HOMEPICTURE -->
                                <div class="form-group col-md-6">
                                    <label for="homepicure" class="control-label">Wijzig de foto van jouw
                                        eetplaats</label>
                                    <input name="homepicture" id="homepicture" type="file"
                                           value="{{old('homepicture')}}">
                                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                                </div>
                            </tr>

                            <!-- CHANGE BIO -->
                            <tr>
                                <div class="form-group col-md-12">
                                    <label for="userbio" class="control-label">Vertel iets over jezelf</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"
                                                                           aria-hidden="true"></i></span>
                                        <textarea name="userbio" id="userbio" cols="40" rows="5"
                                                  class="form-control"
                                                  placeholder="Wie ben je, interesses, hobby's, ...">{{ $user->description }}</textarea>
                                    </div>
                                </div>
                            </tr>

                            <!-- CHANGE EMAIL -->
                            <tr>
                                <div class="form-group col-md-12">
                                    <label for="useremail" class="control-label">Wijzig e-mail adres</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"
                                                                           aria-hidden="true"></i></span>
                                        <input id="useremail" type="email" class="form-control" name="useremail"
                                               value="{{ old('useremail') }}" placeholder="Huidig: {{ $user->email }}">
                                    </div>
                                </div>
                            </tr>

                            <!-- CHANGE PASSWORD -->
                            <tr>
                                <div class="form-group col-md-12">
                                    <label for="password1" class="control-label">Nieuw wachtwoord</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"
                                                                           aria-hidden="true"></i></span>
                                        <input id="password1" type="password" class="form-control" name="password1"
                                               value="{{ old('email') }}">
                                    </div>
                                    <label for="password2" class="control-label">Herhaal nieuw wachtwoord</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"
                                                                           aria-hidden="true"></i></span>
                                        <input id="password2" type="password" class="form-control" name="password2"
                                               value="{{ old('email') }}">
                                    </div>
                                </div>
                            </tr>

                            <!-- SUBMIT BUTTON -->
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-default pull-right">
                                    Wijzigingen opslaan
                                </button>
                            </div>
                        </form>
                    </table>

                </div>
            </div>

            <!-- REVIEWS -->
                <h2 class="page-header">Reviews van andere Apptiters
                    <small>({{ count($reviews) }})</small>
                </h2>
                <section class="comment-list">
                    @if(count($reviews) >= 1)
                    @foreach($reviews as $review)
                            <!-- REVIEW ARTICLE -->
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <a href="/profiel/{{ $review->reviewer_id }}"><img class="img-responsive"
                                                                                   src="/avatars/{{ $review->profilepic }}"/></a>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i>
                                            <a href="/profiel/{{ $review->reviewer_id }}">{{ $review->name }}</a>
                                        </div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i
                                                    class="fa fa-clock-o"></i>{{  date(' d F, Y', strtotime($review->created_at)) }}
                                        </time>
                                    </header>
                                    <div class="comment-post">
                                        @for($i = 0; $i < $review->review_rating; $i++)
                                            <span class="fa fa-star" data-rating="{{$i}}"></span>
                                        @endfor
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
                        <p>Je hebt nog geen reviews ontvangen.</p>
                    @endif
                </section>
        </div>

    </div>

@endsection