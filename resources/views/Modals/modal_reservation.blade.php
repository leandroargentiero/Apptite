<div id="modalReservation" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reserveer bij {{ $event->name }} </h4>
                <p>Kies voor hoeveel personen je wil reserveren.  </p>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="/reservaties/reserveren"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="selReservation">Aantal personen:</label>
                            <select class="form-control" id="selReservation" name="selReservation">
                                @for($i = 1; $i <= $event->event_places; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <input name="available_places" type="hidden" value="{{ $event->event_places }}">
                            <input name="event_id" type="hidden" value="{{ $eventID }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Reserveer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                </div>
            </form>
        </div>
    </div>
</div>