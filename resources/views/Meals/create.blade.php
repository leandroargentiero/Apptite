@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-custom">Maak een nieuwe maaltijd aan</div>
                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- New Meal Form -->
                        <form action="/meals" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!-- Meal Name -->
                            <div class="form-group">
                                <label for="meal-name" class="col-sm-5 control-label">Naam van het gerecht</label>

                                <div class="col-sm-6">
                                    <input type="text" name="meal_name" id="meal-name" class="form-control" value="{{old('meal-name')}}">
                                </div>
                            </div>

                            <!-- Meal Description -->
                            <div class="form-group">
                                <label for="meal-description" class="col-sm-5 control-label">Beschrijving van het gerecht</label>

                                <div class="col-sm-6">
                                    <textarea name="description" id="meal-description" cols="40" rows="5" class="form-control" value="{{old('description')}}"></textarea>
                                </div>
                            </div>

                            <!-- Meal Available places -->
                            <div class="form-group">
                                <label for="meal-places" class="col-sm-5 control-label">Hoeveel personen kunnen er plaatsnemen?</label>

                                <div class="col-sm-6">
                                    <input type="text" name="available_places" id="meal-places" class="form-control" value="{{old('available_places')}}">
                                </div>
                            </div>


                            <!-- Meal Kitchen -->
                            <div class="form-group">
                                <label for="meal-kitchen" class="col-sm-5 control-label">Onder welke keuken valt het gerecht?</label>

                                <div class="col-sm-6">
                                    <input type="text" name="kitchen" id="meal-kitchen" class="form-control" placeholder="Hint: Belgisch, Italiaans, Spaans,..." value="{{old('kitchen')}}">
                                </div>
                            </div>

                            <!-- Meal Price -->
                            <div class="form-group">
                                <label for="meal-price" class="col-sm-5 control-label">Prijs per persoon</label>

                                <div class="col-sm-6">
                                    <input type="text" name="price" id="meal-price" class="form-control" placeholder="€" value="{{old('price')}}">
                                </div>
                            </div>

                            <!-- Meal Picture -->
                            <div class="form-group">
                                <label for="meal-picture" class="col-md-5 control-label">Voeg een foto van het gerecht toe</label>

                                <div class="col-sm-6">
                                    <label class="btn btn-primary" for="meal-upload">
                                        <input name="mealpicture" id="meal-upload" class="meal-upload" type="file" class="file" style="display: none;" value="{{old('mealpicture')}}">
                                        Foto uploaden...
                                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                                    </label>
                                    <img class="upload-preview img-rounded"  width="200" height="200" src="" alt="Meal preview" style="display: none;">
                                </div>
                            </div>


                            <!-- Add Task Button -->
                            <div class="form-group" style="margin-top: 50px;">
                                <div class="col-sm-offset-5 col-sm-6">
                                    <button type="submit" class="btn btn-default pull-right">
                                        <i class="fa fa-plus"></i> Maaltijd aanbieden
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection