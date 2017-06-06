@extends('layouts.master_stripped')

@section('content')
    <div class="wrapper-register">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <img id="logo-login" src="/assets/images/logo_apptite_black.svg" alt="logo apptite">

                    <h3>Registreer</h3>

                    <form role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group col-md-12">
                            <form role="form">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group float-label-control {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Volledige naam</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="Volledige naam" value="{{ old('name') }}">
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group float-label-control {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="">Email</label>
                                    <input name="email" type="email" class="form-control"
                                           placeholder="Email" id="email" value="{{ old('email') }}">
                                </div>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group float-label-control {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="">Straatnaam en plaats</label>
                                    <input name="address" type="text" class="form-control"
                                           placeholder="Straatnaam en plaats" id="address" value="{{ old('address') }}">
                                </div>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group float-label-control {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="">Wachtwoord</label>
                                    <input name="password" type="password" class="form-control"
                                           placeholder="Wachtwoord" id="password">
                                </div>

                                <div class="form-group float-label-control {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="">Herhaal wachtwoord</label>
                                    <input name="password_confirmation" type="password" class="form-control"
                                           placeholder="Herhaal wachtwoord" id="password-confirm">
                                </div>

                            </form>

                            <div class="register-bottom">
                                <button type="submit" class="btn btn-primary">
                                    Registreer
                                </button>

                                <a href="{{ url('/login') }}"><p>Al een account? Login tot het Apptite platform.</p></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

            <!-- GOOGLE API PLACES -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmYV-p7oYTnC1TonGfwqMQlIbeAr0ZCus&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var address = new google.maps.places.Autocomplete(document.getElementById('address'), {
                componentRestrictions: {country: 'be'}
            });
            google.maps.event.addListener(address, 'place_changed', function () {

            });

        });
    </script>
