@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')

    <div class="meal-container">
        <div class="col-md-12">
            @if(Session::has('successmsg'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('successmsg') }}</strong>
                </div>
            @endif
        </div>

        <h3 class="header-title">
            @if(count($meals) > 0)
                Je hebt {{count($meals)}} gerechten in je kookboek staan.
            @else
                Sorry, maar je hebt nog geen gerechten in je kookboek.
            @endif
        </h3>

        @if (count($meals) > 0)
            @foreach ($meals as $meal)
                <div class="meal-item">
                    <!-- Modal -->
                    <div id="eventModal-{{ $meal->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ $meal->meal_name }}</h4>
                                    <h5 class="modal-title">€ {{ $meal->price }} per persoon</h5>
                                </div>

                                <form class="form-horizontal" role="form" method="POST" action="events/aanmaken">
                                    {{ csrf_field() }}
                                <div class="modal-body">
                                    <h5 class="modal-header-title">Kies een dag waarop het Apptite moment zal
                                        doorgaan</h5>

                                        <div class="form-group">
                                            <label for="event_date" class="col-md-4 control-label">Kies een
                                                datum</label>

                                            <div class="col-md-6">
                                                <div class='input-group date' id='datetimepicker'>
                                                    <input type='text' class="form-control date" name="event_date"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                                <input type="hidden" name="available_places"
                                                       value="{{ $meal->available_places }}">
                                                <input type="hidden" name="meal_id" value="{{ $meal->id }}">
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Publiceren</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <img src="mealpictures/{{ $meal->meal_picture }}" alt="meal picture">
                    <div class="meal-description">
                        <div class="meal-description-content">
                            <h3 class="meal-name">{{ $meal->meal_name }}</h3>
                            <h3 class="meal-price"> € {{ $meal->price }} p.p.</h3>
                            <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#eventModal-{{ $meal->id }}">
                                Gerecht publiceren
                            </button>
                            <form class="form-horizontal" role="form" method="POST"
                                  action="/maaltijden/{{ $meal->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-delete" type="submit"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="banner-meals">
        <a href="/maaltijden/aanmaken">
            <div class="banner-meals-overlay">
                <h3>Voeg een nieuw gerecht toe</h3>
                <img class="btnAdd hvr-grow" src="/assets/images/plus.png" alt="add-button">
            </div>
        </a>
    </div>

@endsection