@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img id="logo-login" src="/assets/images/logo_apptite_black.svg" alt="logo apptite">

                    <h3>Gerecht toevoegen</h3>

                    <form action="/maaltijden" method="POST"
                          class="form-horizontal col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}

                                <!-- Meal Name -->
                        <div class="form-group float-label-control">
                            <label for="meal_name">Naam van het gerecht</label>
                            <input id="meal_name" name="meal_name" type="text" class="form-control"
                                   placeholder="Naam van het gerecht" value="{{ old('meal_name') }}">
                        </div>
                        @if ($errors->has('meal_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('meal_name') }}</strong>
                                    </span>
                            @endif


                                    <!-- Meal Description -->
                            <div class="form-group float-label-control">
                                <label for="meal-description">Korte beschrijving</label>
                                    <textarea placeholder="Korte beschrijving" name="meal_description"
                                              id="meal-description" cols="40" rows="5"
                                              class="form-control" value="{{old('meal_description')}}"></textarea>
                            </div>

                            @if ($errors->has('meal_description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('meal_description') }}</strong>
                                    </span>
                                @endif


                                        <!-- Meal Places -->
                                <div class="form-group float-label-control">
                                    <label for="meal-places">Aantal plaatsen</label>
                                    <input placeholder="Aantal beschikbare plaatsen" type="text"
                                           name="available_places"
                                           id="meal-places"
                                           class="form-control" value="{{old('available_places')}}">
                                </div>
                                @if ($errors->has('available_places'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('available_places') }}</strong>
                                    </span>
                                    @endif


                                            <!-- Meal Price -->
                                    <div class="form-group float-label-control">
                                        <label for="meal_price">€</label>
                                        <input placeholder="€ Prijs per persoon" type="text" name="meal_price"
                                               id="meal_price"
                                               class="form-control" value="{{old('meal_price')}}">
                                    </div>
                                    @if ($errors->has('meal_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('meal_price') }}</strong>
                                    </span>
                                        @endif

                                                <!-- Meal Picture -->
                                        <div class="form-group row">
                                            <div class="col-md-5">
                                                <label class="btn btn-primary" for="meal-upload">
                                                    <input name="mealpicture" id="meal-upload" class="meal-upload"
                                                           type="file"
                                                           class="file" style=" display: none;"
                                                           value="{{old('mealpicture')}}">
                                                    Foto uploaden...
                                                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                                                </label>
                                            </div>
                                            @if ($errors->has('mealpicture'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('mealpicture') }}</strong>
                                    </span>
                                            @endif
                                            <div class="col-md-7">
                                                <img class="upload-preview img-rounded" width="300" height="200"
                                                     src=""
                                                     alt="Meal preview" style="display: none;">
                                            </div>
                                        </div>

                                        <!-- ADD MEAL BUTTON-->
                                        <div class="form-group" style="margin-top: 50px;">
                                            <button type="submit" class="btn btn-default pull-right">
                                                <i class="fa fa-plus"></i> Toevoegen
                                            </button>
                                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection