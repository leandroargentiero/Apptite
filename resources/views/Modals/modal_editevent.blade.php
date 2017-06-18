<div id="modalEditEvent" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Jouw event wijzigen:</h4>
            </div>

            <div class="modal-body">

                <form id="updateForm" action="/events/update/{{ $eventID }}" method="POST" class="form-horizontal col-md-12"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                            <!-- Meal Name -->
                    <div class="col-md-12 form-group">
                        <label for="meal-name">Naam van het gerecht</label>

                        <input type="text" name="meal_name" id="meal-name" class="form-control"
                               value="{{ $event->meal_name }}">
                        </input>
                    </div>

                    <!-- Meal Description -->
                    <div class="col-md-12 form-group">
                        <label for="meal-description">Beschrijving van het
                            gerecht</label>

                            <textarea name="meal_description" id="meal-description" cols="40" rows="5"
                                      class="form-control"
                                      value="{{old('description')}}">{{ $event->meal_description }}
                            </textarea>
                    </div>

                    <!-- Meal Available places -->
                    <div class="col-md-12 form-group">
                        <label for="meal-places">Aantal personen</label>

                        <input type="text" name="available_places" id="meal-places" class="form-control"
                               value="{{ $event->event_places }}">
                    </div>

                    <!-- Meal Price -->
                    <div class="col-md-12 form-group">
                        <label for="meal-price">Prijs per persoon</label>

                        <input type="text" name="event_price" id="meal-price" class="form-control" placeholder="€"
                               value="{{ $event->price }}">
                    </div>

                    <!-- EVENT DATE -->
                    <div class="col-md-12 form-group">
                        <label for="datetimepicker">Datum</label>

                        <div class="input-group date" id="datetimepicker">
                            <input type='text' name="event_date" class="form-control date"
                                   value="{{ $event->event_date }}"/>
                                                            <span class="input-group-addon date">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <form id="deleteForm" class="form-horizontal" role="form" method="POST"
                  action="/events/verwijder/{{ $event->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>

            <div class="modal-footer">
                <!-- SUBMIT BUTTON -->
                <button form="updateForm" type="submit" class="btn btn-default">Event wijzigen</button>
                <button form="deleteForm" class="btn btn-danger btn-delete" type="submit">Event verwijderen</button>
            </div>
        </div>
    </div>
</div>