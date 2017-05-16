<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Toggle navbaar for mobile -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand logo" href="/home">Apptite</a>
        </div>

        @if(Auth::check())
        <div class="navbar-search col-sm-3 col-md-3">
            <form class="navbar-form" action="/events/zoeken" method="POST">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" id="navbar-search" class="form-control" placeholder="&#xf002; zoek in jouw stad" name="txtPlace">
                </div>
            </form>
        </div>
        @endif

        <!-- Collect all content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="{{ url('/maaltijden/aanmaken') }}" class="nav-btn upload">Maaltijd toevoegen</a></li>
                    <li id="username">{{ Auth::user()->name }}</li>
                    <li class="dropdown">
                        <a href="#" class="nav-btn-account dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"><img src="/avatars/{{ Auth::user()->profilepic }}"
                                                                           class="profile_pic">Mijn account<span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/mijnkookboek') }}">Mijn kookboek</a></li>
                            <li><a href="{{ url('/mijnevents') }}">Mijn events</a></li>
                            <li><a href="{{ url('/mijnreservaties') }}">Mijn reservaties</a></li>
                            <li><a href="{{ url('/mijnprofiel') }}">Mijn profiel</a></li>
                            <li><a href="{{ url('/logout') }}">Uitloggen</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url('/register') }}" class="nav-register">Registreer</a></li>
                    <li><a href="{{ url('/login') }}" class="nav-login">Login</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmYV-p7oYTnC1TonGfwqMQlIbeAr0ZCus&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('navbar-search'),{
            types: ['(cities)'],
            componentRestrictions : { country: 'be' }
        });
        google.maps.event.addListener(places, 'place_changed', function () {

        });
    });
</script>