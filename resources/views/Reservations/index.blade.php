@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    @isset($reservations)
        <div class="panel panel-default">
            <div class="panel-heading">
                Mijn geboekte reservaties
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $reservation->event_id }}</div>
                                </td>

                                <td>
                                    <form action="/reservaties/{{ $reservation->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
@endsection