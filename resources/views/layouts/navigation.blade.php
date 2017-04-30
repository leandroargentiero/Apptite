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

        <div class="navbar-search col-sm-3 col-md-3">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="&#xf041; zoek in jouw stad" name="searchcity">
                </div>
            </form>
        </div>

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
                            <li><a href="{{ url('/mijnmaaltijden') }}">Mijn maaltijden</a></li>
                            <li><a href="{{ url('') }}">Mijn momenten</a></li>
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