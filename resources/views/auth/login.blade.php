@extends('layouts.master_stripped')
<div class="wrapper-login">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">

                <img id="logo-login" src="/assets/images/logo_apptite_black.svg" alt="logo apptite">

                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <form role="form">
                            <div class="form-group float-label-control">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control"
                                       placeholder="Email" value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            <div class="form-group float-label-control">
                                <label for="">Wachtwoord</label>
                                <input name="password" type="password" class="form-control"
                                       placeholder="Wachtwoord" id="password" value="{{ old('password') }}">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </form>

                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                Inloggen
                            </button>
                        </div>

                        <div class="pull-right">
                            <a href="{{ url('/register') }}">Nog geen account? Maak hier een nieuw account
                                aan.</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

