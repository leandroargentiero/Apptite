@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')

        <div class="meal-container">
            @if (count($meals) > 0)
                @foreach ($meals as $meal)

                    <div class="meal-item">
                        <img src="mealpictures/{{ $meal->meal_picture }}" alt="meal picture">
                        <div class="meal-description">
                            <div class="meal-description-content">
                                <h3 class="meal-name">{{ $meal->meal_name }}</h3>
                                <h3 class="meal-price"> € {{ $meal->price }} p.p.</h3>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#eventModal">
                                    Apptite event aanmaken
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="eventModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ $meal->meal_name }}</h4>
                                    <h5 class="modal-title">€ {{ $meal->price }} per persoon</h5>
                                </div>
                                <div class="modal-body">
                                    <h5 class="modal-header-title">Kies een dag waarop het Apptite moment zal doorgaan</h5>
                                    <form class="form-horizontal" role="form" method="POST" action="events/aanmaken">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="email" class="col-md-4 control-label">Kies een datum</label>

                                            <div class="col-md-6">
                                                <div class="input-group date" id="datetimepicker">
                                                        <input type='text' name="event_date" class="form-control" />
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                </div>
                                                <input type="hidden" name="meal_id" value="{{ $meal->id }}" >
                                            </div>
                                        </div>
                                        <div class="col-med-6">
                                            <button type="submit" class="btn btn-default">Publiceren</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>

@endsection