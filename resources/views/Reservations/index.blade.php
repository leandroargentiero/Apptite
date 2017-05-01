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
            Mijn geboekte reservaties
        </div>

        <div class="panel-body">
            <table class="table table-striped">

                @if(count($reservations) >= 1)
                        <!-- Table HEADING -->
                <thead>
                <th>Apptiter</th>
                <th>Moment</th>
                <th>Datum</th>
                <th>Aantal personen</th>
                <th></th>
                </thead>

                <!-- Table BODY -->
                <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <!-- EVENT NAME -->
                        <td class="table-text">
                            <a href="#">
                                <img class="reservation-avatar" src="/avatars/{{ $reservation->profilepic }}" alt="">
                                {{ $reservation->name }}
                            </a>
                        </td>

                        <!-- MOMENT NAME -->
                        <td class="table-text">
                            <div><a href="events/{{ $reservation->event_id }}">{{ $reservation->meal_name }}</a></div>
                        </td>

                        <!-- EVENT DATE -->
                        <td class="table-text">
                            <div>{{ $reservation->event_date}}</div>
                        </td>

                        <!-- RESERVATION PLACES -->
                        <td class="table-text">
                            <div>{{ $reservation->reservation_places}}</div>
                        </td>

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