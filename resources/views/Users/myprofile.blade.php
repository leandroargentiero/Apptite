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
                        <li class="city"><h4><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $user->city }}</h4>
                        </li>
                        <li class="member-since"> Apptiter sinds:{{ $user->created_at }}</li>
                    </ul>
                </div>
            </div>

            <a class="cta-toevoegen" href="{{ url('/maaltijden/aanmaken') }}">Een nieuw gerecht toevoegen</a>

        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profiel wijzigen</h3></div>
                <div class="panel-body">

                    <table class="table">


                        <form class="form-horizontal profile-information" role="form" method="POST"
                              action="/mijnprofiel/update" enctype="multipart/form-data">
                            {{ csrf_field() }}

                                    <!-- CHANGE AVATAR -->
                            <tr>
                                <div class="form-group col-md-12">
                                    <label for="useravatar" class="control-label">Wijzig profielfoto</label>
                                    <input name="useravatar" id="useravatar" type="file"
                                           value="{{old('useravatar')}}">
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
        </div>

    </div>

@endsection