@extends('layouts.master')

@section('banner')
    @include('partials.banner')
@stop

@section('content')
    @if (count($reservations) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
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
                                <form action="" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button>Delete Task</button>
                                </form>
                                <!-- TODO: Delete Button -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection