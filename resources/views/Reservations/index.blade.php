@extends('layouts.master')

@section('banner')
@include('partials.banner')
@stop

@section('content')

        <!-- FEEDBACK MESSAGES -->
<div class="col-md-12">
    @if(Session::has('successmessage'))
        <div class="alert alert-success">
            <strong>{{ Session::get('successmessage') }}</strong>
        </div>
    @endif
</div>

<!-- RESERVATIONS TABLE -->
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading panel-heading-custom">
            Alle events waarvoor je hebt gereserveerd
        </div>

        <div class="panel-body">
            <table class="table">

                @if(count($reservations) >= 1)
                        <!-- Table HEADING -->
                <thead>
                <th>Apptite chef</th>
                <th>Event</th>
                <th>Datum</th>
                <th>Aantal personen</th>
                <th></th>
                </thead>

                <!-- Table BODY -->
                <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <!-- CHEF NAME -->
                        <td class="table-text">
                            <a href="profiel/{{ $reservation->user_id }}">{{ $reservation->name }}</a>
                        </td>

                        <!-- EVENT NAME -->
                        <td class="table-text">
                            <div><a href="events/{{ $reservation->event_id }}">{{ $reservation->meal_name }}</a></div>
                        </td>

                        @if( date(' d F, Y', strtotime($reservation->event_date)) >= date(' d F, Y', strtotime($currentdate)) )
                        <!-- EVENT DATE -->
                        <td class="table-text">
                            <div>{{ date(' d F, Y', strtotime($reservation->event_date)) }}</div>
                        </td>
                        @else
                            <td class="table-text">
                                <p style="color: red; font-weight: 800;">Verlopen</p>
                            </td>
                        @endif

                        <!-- RESERVATION PLACES -->
                        <td class="table-text">
                            <div>{{ $reservation->reservation_places}}</div>
                        </td>

                        @if( date(' d F, Y', strtotime($reservation->event_date)) >= date(' d F, Y', strtotime($currentdate)) )
                        <!-- DELETE RESERVATION -->
                        <td class="table-text">
                            <form action="/reservaties/{{ $reservation->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                    Annuleren
                                </button>
                            </form>
                        </td>
                        @else
                        <!-- PLACE RESERVATION -->
                        <td class="table-text">
                            <button class="btn btn-default"><i class="fa fa-star-o" aria-hidden="true"></i>
                                Geef een review
                            </button>
                        </td>
                        @endif
                    </tr>
                @endforeach
                @else
                    <tr>
                        <h4>Er staan momenteel geen reservaties gepland.</h4>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection