<div id="modalEditEvent" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Jouw moment wijzigen:</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                     <!-- Meal Name -->
                    <div class="form-group">
                        <label for="meal-name" class="col-sm-5">Naam van het gerecht</label>

                        <div class="col-sm-6">
                            <input type="text" name="meal_name" id="meal-name" class="form-control"
                                   value="{{ $event->meal_name }}">
                            </input>
                        </div>
                    </div>

                    <!-- Meal Description -->
                    <div class="form-group">
                        <label for="meal-description" class="col-sm-5">Beschrijving van het
                            gerecht</label>

                        <div class="col-sm-6">
                            <textarea name="description" id="meal-description" cols="40" rows="5" class="form-control"
                                      value="{{old('description')}}">{{ $event->description }}
                            </textarea>
                        </div>
                    </div>

                    <!-- Meal Available places -->
                    <div class="form-group">
                        <label for="meal-places" class="col-sm-5">Aantal personen</label>

                        <div class="col-sm-6">
                            <input type="text" name="available_places" id="meal-places" class="form-control"
                                   value="{{ $event->available_places }}">
                        </div>
                    </div>

                    <!-- Meal Price -->
                    <div class="form-group">
                        <label for="meal-price" class="col-sm-5">Prijs per persoon</label>

                        <div class="col-sm-6">
                            <input type="text" name="price" id="meal-price" class="form-control" placeholder="€"
                                   value="{{ $event->price }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="datetimepicker" class="col-sm-5">Datum</label>

                        <div class="input-group col-sm-6" id="datetimepicker">
                            <input type='text' name="event_date" class="form-control" value="{{ $event->event_date }}" />
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Wijzigen</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Moment Verwijderen</button>
            </div>
        </div>
    </div>
</div>