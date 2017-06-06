<div class="wrapper">
    <div class="hero overlay">
        <div class="header">
            <img class="header-logo" src="/assets/images/logo_apptite.svg" alt="logo apptite">
            <div class="row">
                <h2>Schuif bij hobbychefs aan tafel voor een huisbereide maaltijd</h2>
            </div>
            <form action="/events/zoeken" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row searchbox animated fadeInUpBig">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="input-group col-md-12">
                            <input type="text" name="txtPlace" id="txtPlace" class="form-control input-lg"
                                   placeholder="&#xf002;  Zoek maaltijden in jouw buurt... "
                                   style="font-family: Roboto, FontAwesome;"required/>
                        <span class="input-group-btn">
                            <button class="btn btn-default input-lg" type="submit">
                                <h4>Zoeken</h4>
                            </button>
                        </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- GOOGLE API PLACES -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmYV-p7oYTnC1TonGfwqMQlIbeAr0ZCus&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('txtPlace'),{
            types: ['(cities)'],
            componentRestrictions : { country: 'be' }
        });
        google.maps.event.addListener(places, 'place_changed', function () {

        });
    });
</script>