@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    <div class="profile-container">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="profile-header">
                    <ul>
                        <li class="user-image">
                            <img class="user-avatar img-circle" src="avatars/default.jpg" alt="user avatar">
                        </li>
                        <li class="username"><h3>{{ $user->name }}</h3></li>
                        <li class="city"><h4><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $user->city }}</h4>
                        </li>
                        <li class="member-since"> Apptiter sinds:{{ $user->created_at }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profiel wijzigen</h3></div>
                <div class="panel-body">

                    <table class="table">


                        <form class="form-horizontal profile-information" role="form" method="POST" action="/mijnprofiel/update" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!-- CHANGE AVATAR -->
                            <tr>
                                <div class="form-group col-md-12">

                                    <label for="upload-avatar" class="control-label">Voeg een profielfoto toe</label>
                                    <input name="mealpicture" id="meal-upload" class="meal-upload" type="file"
                                           value="{{old('mealpicture')}}">
                                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                                </div>
                            </tr>

                            <!-- CHANGE BIO -->
                            <tr>
                                <div class="form-group col-md-12">
                                    <label for="email" class="control-label">Vertel iets over jezelf</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"
                                                                           aria-hidden="true"></i></span>
                                        <textarea name="description" id="meal-description" cols="40" rows="5"
                                                  class="form-control"
                                                  value="{{old('description')}}"
                                                  placeholder="Wie ben je, interesses, hobby's, ..."></textarea>
                                    </div>
                                </div>
                            </tr>

                            <!-- CHANGE EMAIL -->
                            <tr>
                                <div class="form-group col-md-12">
                                    <label for="email" class="control-label">Wijzig e-mail adres</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"
                                                                           aria-hidden="true"></i></span>
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}">
                                    </div>
                                </div>
                            </tr>

                            <!-- CHANGE PASSWORD -->
                            <tr>
                                <div class="form-group col-md-12">
                                    <label for="email" class="control-label">Nieuw wachtwoord</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"
                                                                           aria-hidden="true"></i></span>
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}">
                                    </div>
                                    <label for="email" class="control-label">Herhaal nieuw wachtwoord</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"
                                                                           aria-hidden="true"></i></span>
                                        <input id="email" type="email" class="form-control" name="email"
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